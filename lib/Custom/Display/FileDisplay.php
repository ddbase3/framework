<?php

namespace Custom\Display;

class FileDisplay extends AbstractDisplay {

	private $data;

	// Implementation of IOutput

	public function getOutput($out = "html") {
		$suffix = "";
		$p = strrpos($this->data["filename"], ".");
		if ($p !== false) $suffix = substr($this->data["filename"], $p + 1);

		$contenttype = "";
		if ($suffix == "txt") $contenttype = "text/plain";
		if ($suffix == "html") $contenttype = "text/html";
		if ($suffix == "json") $contenttype = "application/json";
		if ($suffix == "jpg") $contenttype = "image/jpg";
		if ($suffix == "png") $contenttype = "image/png";
		if ($suffix == "gif") $contenttype = "image/gif";
		if ($suffix == "eml") $contenttype = "message/rfc822";

		$stream = file_get_contents($this->data["filename"]);

		$d = new \Custom\Display\StreamDisplay;
		$d->setData(array(
			"filename" => $this->data["filename"],
			"stream" => $stream,
			"contenttype" => $contenttype
		));
		return $d->getOutput();
	}

	// Implementation of IDisplay

	public function setData($data) {
		$this->data = array_merge(array(
			"filename" => ""
		), $data);
	}

}
