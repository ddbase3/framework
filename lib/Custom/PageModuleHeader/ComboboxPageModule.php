<?php

namespace Custom\PageModuleHeader;

use Page\Moduled\AbstractModuleHeader;

class ComboboxPageModule extends AbstractModuleHeader {

	public function getName() {
		return "comboboxpagemodule";
	}

	public function getRequiredModules() {
		return array('jquerypagemodule', 'jqueryuipagemodule');
	}

	public function getHtml() {
		$str = '<link rel="stylesheet" href="assets/combobox/jqueryui.combobox.css" />' . "\n";
		$str .= '<script src="assets/combobox/jqueryui.combobox.js"></script>';
		return $str;
	}

	public function getPriority() {
		return 50;
	}

}
