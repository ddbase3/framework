<?php

namespace Custom\PageModuleHeader;

use Page\Moduled\AbstractModuleHeader;

class CmsPageModule extends AbstractModuleHeader {

	private $servicelocator;
	private $statushandler;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->statushandler = $this->servicelocator->get('statushandler');
	}

	public function getName() {
		return "cmspagemodule";
	}

	public function getRequiredModules() {
		return array('jqueryuipagemodule');
	}

	public function getHtml() {
		if (!intval($this->statushandler->get("editor"))) return '';
		return '<script src="assets/cms/cms.js"></script>';
	}

	public function getPriority() {
		return 99;
	}

}
