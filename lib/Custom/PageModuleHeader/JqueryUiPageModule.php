<?php

namespace Custom\PageModuleHeader;

use Page\Moduled\AbstractModuleHeader;

class JqueryUiPageModule extends AbstractModuleHeader {

	public function getName() {
		return "jqueryuipagemodule";
	}

	public function getRequiredModules() {
		return array('jquerypagemodule');
	}

	public function getHtml() {
		$str = '<link rel="stylesheet" href="assets/jqueryui/jquery-ui.min.css" />' . "\n";
		$str .= '<script src="assets/jqueryui/jquery-ui.min.js"></script>';
		return $str;
	}

	public function getPriority() {
		return 20;
	}

}
