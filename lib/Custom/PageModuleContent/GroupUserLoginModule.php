<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractFormModuleContent;

class GroupUserLoginModule extends AbstractFormModuleContent {

	private $servicelocator;
	private $language;
	private $accesscontrol;
	private $cnf;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->language = $this->servicelocator->get('language');
		$this->accesscontrol = $this->servicelocator->get('accesscontrol');
		$this->cnf = $this->servicelocator->get('configuration')->get('base');
	}

	private function getContinueUrl() {
		return strlen($this->cnf["intern"]) ? $this->cnf["url"] . $this->cnf["intern"] : "";
	}

	// Implementation of IPageModule

	public function getHtml() {
		$view = $this->servicelocator->get('view');
		$view->setTemplate('PageModuleContent/GroupUserLoginModule.php');
		$view->assign("action", $this->getUrl());
		$view->assign("continue", $this->getContinueUrl());

		$userid = $this->accesscontrol->getUserId();
		$view->assign("authenticated", $userid != null);
		$view->assign("language", $this->language->getLanguage());
		$view->assign("status", "not implemented");
		$view->assign("userid", $userid == null ? "null" : $userid);
		$view->assign("userservice", "not implemented");

		return $view->loadTemplate();
	}

	// Specialization of AbstractFormModuleContent

	public function getForwardUrl() {
		return isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : $this->cnf["url"] . $this->cnf["intern"];
	}

}
