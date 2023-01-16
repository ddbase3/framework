<?php

namespace Custom\PageModuleHeader;

use Page\Moduled\AbstractModuleHeader;

class JqueryUploadFilePageModule extends AbstractModuleHeader {

	public function getName() {
		return "jqueryuploadfilepagemodule";
	}

	public function getRequiredModules() {
		return array('jquerypagemodule');
	}

	public function getHtml() {
		$str = '<link rel="stylesheet" href="assets/uploadfile/uploadfile.css" />' . "\n";
		$str .= '<script src="assets/uploadfile/jquery.uploadfile.min.js"></script>';
		return $str;
	}

	public function getPriority() {
		return 50;
	}

}
