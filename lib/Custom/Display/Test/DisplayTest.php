<?php

namespace Custom\Display\Test;

use Page\Api\IPage;

class DisplayTest implements IPage {

	// Implementation of IBase

	public function getName() {
		return "displaytest";
	}

	// Implementation of IPage

        public function getUrl() {
                return $this->getName() . ".php";
        }

	// Implementation of IOutput

	public function getOutput($out = "html") {
		$str = '<h1>DisplayTest</h1>';
		$d = new \Custom\Display\FileDisplay;
		
		// $d->setData(array("filename" => "local/Page/page-index.json"));
		$d->setData(array("filename" => "assets/custom/com/info.png"));
		// $d->setData(array("filename" => "userfiles/mails/00/1d/001d48b6-9404-4df0-a511-55bf5b1f1dfa.eml"));

		$str .= $d->getOutput();
		return $str;
	}

	public function getHelp() {
		return 'Help of DisplayTest' . "\n";
	}

}
