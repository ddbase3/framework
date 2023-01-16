<?php

namespace Custom\Display;

class EmailDisplay extends AbstractDisplay {

	private $servicelocator;
	private $accesscontrol;

	private $data;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
	}

	// Implementation of IOutput

	public function getOutput($out = "html") {
		$out = "";


		// call attachment
		if (isset($_REQUEST["filename"]) && isset($_REQUEST["attachment"])) {

			$content = file_get_contents($_REQUEST["filename"]);
			$mp = new \Util\MailParser\MailParser;
			$mp->fromString($content);
			$parts = $mp->getParts();

			$attpart = $this->getAttachmentPart($parts, $_REQUEST["attachment"]);
			$headers = $attpart->getHeaders();
			$ct = $this->getHeader($headers, 'Content-Type');

			header("Content-Type: " . $ct);
			header("Content-Disposition: attachment; filename=\"" . $_REQUEST["attachment"] . "\"");

			return base64_decode($attpart->getBody());
		}


		$mp = new \Util\MailParser\MailParser;
		$mp->fromString($this->data["stream"]);
		// echo '<pre>' . $mp->toString() . '</pre>';  // for debug only
		$parts = $mp->getParts();

		$headerpart = is_array($parts) ? $parts[0] : $parts;
		$headers = $headerpart->getHeaders();

		$ctheader = $this->getHeader($headers, 'Content-Type');
		$ctparts = explode(';', $ctheader);

		$message = $this->getMessage($parts);
		if (!strlen($message)) $message = $this->getMessage($parts, "plain");

		$attachments = $this->getAttachmentList($parts);


		$view = $this->servicelocator->get('view');
		$view->setTemplate('Display/EmailDisplay.php');

		$view->assign("filename", $this->data["filename"]);

		$view->assign("date", htmlentities($this->getHeader($headers, 'Date')));
		$view->assign("from", htmlentities($this->getHeader($headers, 'From')));
		$view->assign("to", htmlentities($this->getHeader($headers, 'To')));
		$view->assign("subject", iconv_mime_decode($this->getHeader($headers, 'Subject'), 0, "UTF-8"));
		$view->assign("importance", htmlentities($this->getHeader($headers, 'Importance')));
		$view->assign("contenttype", htmlentities($ctparts[0]));
		$view->assign("message", utf8_encode(quoted_printable_decode($message)));
		$view->assign("attachments", $attachments);

		$out = $view->loadTemplate();


		return $out;
	}

	// Implementation of IDisplay

	public function setData($data) {
		$this->data = array_merge(array(
			"filename" => "",
			"stream" => ""
		), $data);
	}

	// Private methods

	private function getHeader(&$headers, $name) {
		$value = '';
		if (!is_array($headers)) return null;
		foreach ($headers as $header)
			if ($header["name"] == $name)
				$value = $header["value"];
		return $value;
	}

	private function getMessage(&$parts, $type = "html") {

		$message = "";

		$headerpart = is_array($parts) ? $parts[0] : $parts;
		$headers = $headerpart->getHeaders();
		$ct = $this->getHeader($headers, 'Content-Type');
		$cte = $this->getHeader($headers, 'Content-Transfer-Encoding');

		if ($type == "plain" && strpos($ct, "text/plain") !== false)
			$message = nl2br($cte == "base64" ? base64_decode($headerpart->getBody()) : $headerpart->getBody());

		if ($type == "html" && strpos($ct, "text/html") !== false)
			$message = $cte == "base64" ? base64_decode($headerpart->getBody()) : $headerpart->getBody();

		if (strpos($ct, "multipart/mixed") !== false) for ($i = 1; $i < sizeof($parts); $i++) {
			$m = $this->getMessage($parts[$i], $type);
			if (!strlen($m)) continue;
			$message = $m;
			break;
		}

		if (strpos($ct, "multipart/alternative") !== false) for ($i = 1; $i < sizeof($parts); $i++) {
			$m = $this->getMessage($parts[$i], $type);
			if (!strlen($m)) continue;
			$message = $m;
			break;
		}

		if (strpos($ct, "multipart/related") !== false) {
			for ($i = 1; $i < sizeof($parts); $i++) {
				$m = $this->getMessage($parts[$i], $type);
				if (!strlen($m)) continue;
				$message = $m;
				break;
			}
			for ($i = 1; $i < sizeof($parts); $i++) {
				$innerheaders = $parts[$i]->getHeaders();
				$ict = $this->getHeader($innerheaders, 'Content-Type');

				if (strpos($ict, "image/") === false) continue;

				$icte = $this->getHeader($innerheaders, 'Content-Transfer-Encoding');  // z.B. base64
				$icid = trim($this->getHeader($innerheaders, 'Content-ID'), "<>");

				$find = "cid:" . $icid;
				$replace = "data:" . $ict . ";" . $icte . "," . $parts[$i]->getBody();
				$message = str_replace($find, $replace, $message);
			}
		}

		return $message;

	}

	private function getAttachmentList(&$parts) {

		$attachments = array();

		$headerpart = is_array($parts) ? $parts[0] : $parts;
		$headers = $headerpart->getHeaders();

		$ct = $this->getHeader($headers, 'Content-Type');
		$cd = $this->getHeader($headers, 'Content-Disposition');

		if (strpos($ct, "multipart/mixed") !== false) for ($i = 1; $i < sizeof($parts); $i++) {
			$as = $this->getAttachmentList($parts[$i]);
			$attachments = array_merge($attachments, $as);
		}

		if ($cd == "attachment") {
			$p1 = strpos($ct, 'name="');
			$p2 = strpos($ct, '"', $p1 + 6);
			$attachments[] = substr($ct, $p1 + 6, $p2 - $p1 - 6);
		}

		return $attachments;
	}

	private function getAttachmentPart(&$parts, $attname) {

		if (is_array($parts)) {
			foreach ($parts as $part) {
				$attachment = $this->getAttachmentPart($part, $attname);
				if ($attachment != null) return $attachment;
			}
			return null;
		}

		$headers = $parts->getHeaders();
		$ct = $this->getHeader($headers, 'Content-Type');
		$cd = $this->getHeader($headers, 'Content-Disposition');
		if ($cd == "attachment" && strpos($ct, $attname) !== false) return $parts;

		return null;
	}

}
