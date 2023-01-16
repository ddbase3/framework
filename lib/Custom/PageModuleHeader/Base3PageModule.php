<?php

namespace Custom\PageModuleHeader;

use Page\Moduled\AbstractModuleHeader;

class Base3PageModule extends AbstractModuleHeader {

	public function getName() {
		return "base3pagemodule";
	}

	public function getRequiredModules() {
		return array('jquerypagemodule');
	}

	public function getHtml() {
		return implode("\n", array(
			'<link rel="stylesheet" href="assets/custom/style.css?t=16" />',
			'<script src="assets/custom/script.js?t=8"></script>',
			'<meta name="generator" content="BASE3 XRM" />'
		));
	}

	public function getPriority() {
		return 80;
	}
}
