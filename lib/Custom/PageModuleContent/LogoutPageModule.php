<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractModuleContent;

class LogoutPageModule extends AbstractModuleContent {

	private $servicelocator;
	private $language;
	private $accesscontrol;
	private $services;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->language = $this->servicelocator->get('language');
		$this->accesscontrol = $this->servicelocator->get('accesscontrol');
		$this->services = $this->servicelocator->get('services');
	}

	// Implementation of IBase

	public function getName() {
		return "logoutpagemodule";
	}

	// Implementation of IPageModule

	public function getHtml() {

		$view = $this->servicelocator->get('view');
		$view->setTemplate('PageModuleContent/LogoutPageModule.php');

		$view->assign("language", $this->language->getLanguage());

		$userid = $this->accesscontrol->getUserId();
		$view->assign("userid", $userid);

		$view->assign("services", $this->services);

		return $view->loadTemplate();

	}
}
