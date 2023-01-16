<?php

namespace Custom\PageModuleHeader;

use Page\Moduled\AbstractModuleHeader;

class CkeditorPageModule extends AbstractModuleHeader {

	public function getName() {
		return "ckeditorpagemodule";
	}

	public function getRequiredModules() {
		return array();
	}

	public function getHtml() {
		$str = '<script src="assets/ckeditor/inline/ckeditor.js"></script>';
		return $str;
	}

	public function getPriority() {
		return 20;
	}

}
