<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractModuleContent;

class LogViewerPageModule extends AbstractModuleContent {

	private $servicelocator;
	private $accesscontrol;
	private $logger;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->accesscontrol = $this->servicelocator->get('accesscontrol');
		$this->logger = $this->servicelocator->get('logger');
	}

	// Implementation of IBase

	public function getName() {
		return "logviewerpagemodule";
	}

	// Implementation of IPageModule

	public function getHtml() {
		if ($this->accesscontrol->getUserId() != "dd") {
			header("Location: /");
			exit;
		}

		$view = $this->servicelocator->get('view');
		$view->setTemplate('PageModuleContent/LogViewerPageModule.php');

		$view->assign("name", $this->getName());

		$num = isset($this->data["num"]) ? intval($this->data["num"]) : 20;
		$logs = $this->logger->getLogs($this->data["log"], $num, true);
		$view->assign("logs", $logs);

		return $view->loadTemplate();
	}

}
