<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractModuleContent;

class XrmEntryFormModule extends AbstractModuleContent {

	private $servicelocator;
	private $xrm;
	private $accesscontrol;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->xrm = $this->servicelocator->get('xrmglobal');
		$this->accesscontrol = $this->servicelocator->get('accesscontrol');
	}

	public function getName() {
		return "xrmentryformmodule";
	}

	public function getHtml() {
		if (!$this->accesscontrol->getUserId()) {
			header("Location: /");
			exit;
		}

		$view = $this->servicelocator->get('view');
		$view->setTemplate('PageModuleContent/XrmEntryFormModule.php');
		$defaults = array("lang" => "", "type" => "", "fields" => array(), "action" => "", "continue" => "");
		foreach ($defaults as $tag => $default) $view->assign($tag, isset($this->data[$tag]) ? $this->data[$tag] : $default);

		$entry = null;
		if (isset($_REQUEST["id"])) {
			$entry = $this->xrm->getEntry($_REQUEST["id"]);
			$access = $this->xrm->getAccess($entry);
			if ($access != "write") return "No access";
			$entry = (array) $entry;
		}
		$view->assign("entry", $entry);

		return $view->loadTemplate();
	}

}
