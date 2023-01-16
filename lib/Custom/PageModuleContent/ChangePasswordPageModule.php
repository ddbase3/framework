<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractFormModuleContent;

class ChangePasswordPageModule extends AbstractFormModuleContent {

	private $servicelocator;
	private $language;
	private $accesscontrol;
	private $usermanager;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->language = $this->servicelocator->get('language');
		$this->accesscontrol = $this->servicelocator->get('accesscontrol');
		$this->usermanager = $this->servicelocator->get('usermanager');
	}

	// Implementation of IPageModule

	public function getHtml() {

		if (!$this->accesscontrol->getUserId()) {
			header("Location: /");
			exit;
		}

		$view = $this->servicelocator->get('view');
		$view->setTemplate('PageModuleContent/ChangePasswordPageModule.php');

		$view->assign("action", $this->getUrl());
		$view->assign("continue", $this->getContinueUrl());

		$view->assign("language", $this->language->getLanguage());

		return $view->loadTemplate();

	}

	// Specialization of AbstractFormModuleContent

	public function processPostData() {
		if ($_REQUEST["newpassword"] != $_REQUEST["confirmnewpassword"]) return;
		$this->usermanager->changePassword($_REQUEST["oldpassword"], $_REQUEST["newpassword"]);
	}

	// Private methods

	private function getContinueUrl() {
		return $_SERVER['REQUEST_URI'];
	}
}
