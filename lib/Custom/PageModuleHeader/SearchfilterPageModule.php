<?php

namespace Custom\PageModuleHeader;

use Page\Moduled\AbstractModuleHeader;

class SearchfilterPageModule extends AbstractModuleHeader {

	public function getName() {
		return "searchfilterpagemodule";
	}

	public function getRequiredModules() {
		return array('jqueryuipagemodule');
	}

	public function getHtml() {
		$str = '<link rel="stylesheet" href="assets/searchfilter/jquery.searchfilter.css" />' . "\n";
		$str .= '<script src="assets/searchfilter/jquery.searchfilter.js"></script>';
		return $str;
	}

	public function getPriority() {
		return 50;
	}

}
