<?php

namespace Custom\PageModuleHeader;

use Page\Moduled\AbstractModuleHeader;

class TouchpunchPageModule extends AbstractModuleHeader {

	public function getName() {
		return "touchpunchpagemodule";
	}

	public function getRequiredModules() {
		return array('jqueryuipagemodule');
	}

	public function getHtml() {
		return '<script src="assets/touchpunch/jquery.ui.touch-punch.min.js"></script>';
	}

	public function getPriority() {
		return 30;
	}

}
