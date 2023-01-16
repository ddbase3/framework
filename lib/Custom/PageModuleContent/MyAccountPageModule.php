<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractFormModuleContent;

class MyAccountPageModule extends AbstractFormModuleContent {

	private $servicelocator;
	private $accesscontrol;
	private $usermanager;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->accesscontrol = $this->servicelocator->get('accesscontrol');
		$this->usermanager = $this->servicelocator->get('usermanager');
	}

	// Implementation of IBase

	public function getName() {
		return "myaccountpagemodule";
	}

	// Implementation of IPageModule

	public function getHtml() {

		if (!$this->accesscontrol->getUserId()) {
			header("Location: /");
			exit;
		}

		$view = $this->servicelocator->get('view');
		$view->setTemplate('PageModuleContent/MyAccountPageModule.php');
		$view->assign("user", $this->usermanager->getUser());
		$view->assign("groups", $this->usermanager->getGroups());
		return $view->loadTemplate();
	}

}
