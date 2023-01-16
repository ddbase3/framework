<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractModuleContent;

class XrmEntryPageModule extends AbstractModuleContent {

	private $servicelocator;
	private $accesscontrol;
	private $xrm;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->accesscontrol = $this->servicelocator->get('accesscontrol');
		// $this->xrm = $this->servicelocator->get('xrm');
		$this->xrm = $this->servicelocator->get('xrmglobal');
	}

	public function getName() {
		return "xrmentrypagemodule";
	}

	public function getHtml() {

		// open for public user
		// if (!$this->accesscontrol->getUserId()) return "";

		if (!isset($_REQUEST["id"])) return "";

		$entry = $this->xrm->getEntry($_REQUEST["id"]);

		$display = new \Custom\Display\XrmEntryDisplay;
		$display->setData(array("xrmentry" => $entry));

		$view = $this->servicelocator->get('view');
		$view->setTemplate('PageModuleContent/XrmEntryPageModule.php');
		$view->assign("entry", $display->getOutput());

		return $view->loadTemplate();
	}

}
