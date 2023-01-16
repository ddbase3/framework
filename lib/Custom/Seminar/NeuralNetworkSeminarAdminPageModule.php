<?php

namespace Custom\Seminar;

use Page\Moduled\AbstractFormModuleContent;

class NeuralNetworkSeminarAdminPageModule extends AbstractFormModuleContent {

	private $servicelocator;
	private $accesscontrol;
	private $usermanager;
	private $desktop;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->accesscontrol = $this->servicelocator->get('accesscontrol');
		$this->usermanager = $this->servicelocator->get('usermanager');
		$this->desktop = $this->servicelocator->get('desktop');
	}

	// Implementation of IPageModule

	public function getHtml() {
		$this->checkUser();

		$view = $this->servicelocator->get('view');
		$view->setTemplate('Seminar/NeuralNetworkSeminarAdminPageModule.php');
		$view->assign("name", $this->getName());

		$view->assign("action", $this->getUrl());
		$view->assign("continue", $this->getContinueUrl());

		$view->assign("users", array("dd", "ddahme", "Embai"));

		return $view->loadTemplate();

	}

	// Specialization of AbstractFormModuleContent

	public function processPostData() {
		$this->checkUser();

		$processid = date("YmdHis");
		for ($i = 0; $i <= 9; $i++)
			$this->desktop->addTask("aihandwrite", array("number" => $i, "processid" => $processid), array($_REQUEST["userid"]));

		mkdir(DIR_LOCAL . "HandwrittenNumbers/" . $processid . "-" . $_REQUEST["userid"], 0777);

	}

	// Private methods

	private function getContinueUrl() {
		return $_SERVER['REQUEST_URI'];
	}

	private function checkUser() {
		$user = $this->usermanager->getUser();
		
		if ($user == null || ((object) $user)->role != "admin") {
			header("Location: /");
			exit;
		}
	}

}
