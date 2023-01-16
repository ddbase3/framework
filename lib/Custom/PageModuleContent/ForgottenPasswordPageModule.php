<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractFormModuleContent;

class ForgottenPasswordPageModule extends AbstractFormModuleContent {

	private $servicelocator;
	private $language;
	private $usermanager;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->language = $this->servicelocator->get('language');
		$this->usermanager = $this->servicelocator->get('usermanager');
	}

	// Implementation of IPageModule

	public function getHtml() {

		$view = $this->servicelocator->get('view');
		$view->setTemplate('PageModuleContent/ForgottenPasswordPageModule.php');

		$view->assign("action", $this->getUrl());
		$view->assign("continue", $this->getContinueUrl());

		$view->assign("language", $this->language->getLanguage());

		return $view->loadTemplate();

	}

	// Specialization of AbstractFormModuleContent

	public function processPostData() {

		// TODO

	}

	// Private methods

	private function getContinueUrl() {
		return $_SERVER['REQUEST_URI'];
	}
}
