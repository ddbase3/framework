<?php

namespace Custom\PageModuleHeader;

use Page\Moduled\AbstractModuleHeader;

class JqueryPageModule extends AbstractModuleHeader {

	public function getName() {
		return "jquerypagemodule";
	}

	public function getHtml() {
		return '<script src="assets/jquery/jquery-3.4.1.min.js"></script>';
	}

	public function getPriority() {
		return 10;
	}

}
