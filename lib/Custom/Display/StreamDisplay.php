<?php

namespace Custom\Display;

class StreamDisplay extends AbstractDisplay {

	private $data;

	// Implementation of IOutput

	public function getOutput($out = "html") {
		$out = "";

		// plain
		if ($this->data["contenttype"] == "text/plain") $out = nl2br($this->data["stream"]);
		if ($this->data["contenttype"] == "text/html") $out = $this->data["stream"];
		if ($this->data["contenttype"] == "application/json") $out = '<pre>' . $this->data["stream"] . '</pre>';

		// image
		if (in_array($this->data["contenttype"], array("image/jpeg", "image/png", "image/gif")))
			$out = '<img src="data:' . $this->data["contenttype"] . ';base64, ' . base64_encode($this->data["stream"]) . '" />';

		// mail
		if ($this->data["contenttype"] == "message/rfc822") {
			$d = new \Custom\Display\EmailDisplay;
			$d->setData(array(
				"filename" => $this->data["filename"],
				"stream" => $this->data["stream"]
			));
			$out = $d->getOutput();
		}

		return $out;
	}

	// Implementation of IDisplay

	public function setData($data) {
		$this->data = array_merge(array(
			"filename" => "",
			"stream" => "",
			"contenttype" => ""
		), $data);
	}

}
