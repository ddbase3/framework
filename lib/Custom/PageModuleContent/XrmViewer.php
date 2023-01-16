<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractModuleContent;

class XrmViewer extends AbstractModuleContent {

	private $servicelocator;
	private $view;
	private $xrm;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->view = $this->servicelocator->get('view');
		$this->xrm = $this->servicelocator->get('xrm');
	}

	public function getName() {
		return "xrmviewer";
	}

	public function getHtml() {
		$this->view->setTemplate('PageModuleContent/XrmViewer.php');
		$id = isset($_REQUEST["xrmid"]) ? $_REQUEST["xrmid"] : $this->data["id"];
		$entry = $this->xrm->getEntry($id);
		$this->view->assign("entry", $entry);
		return $this->view->loadTemplate();
	}

}
