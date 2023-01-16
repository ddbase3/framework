<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractModuleContent;

class PageHeader extends AbstractModuleContent {

	private $servicelocator;
	private $statushandler;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->statushandler = $this->servicelocator->get('statushandler');
	}

	public function getName() {
		return "pageheader";
	}

	public function getHtml() {
		if (isset($_REQUEST["embed"])) return "";

		$view = $this->servicelocator->get('view');
		$view->setTemplate('PageModuleContent/PageHeader.php');
		$view->assign("name", $_REQUEST["name"]);
		$view->assign("navigation", $this->servicelocator->get('navigation')->getOutput());

		$loginpage = $this->servicelocator->get('loginpage');
		$ifs = class_implements($loginpage);
		$view->assign("loginurl", in_array("Microservice\\Api\\IMicroserviceConnector", $ifs) ? "singlesignon.php" : $loginpage->getUrl());

		// Zentraler Logout
		$view->assign("logouturl", "https://account.base3.de/logout.php");

		$language = $this->servicelocator->get('language')->getLanguage();
		$view->assign("language", $language);

		$userid = $this->servicelocator->get('accesscontrol')->getUserId();
		$view->assign("userid", $userid);

		$fullname = "";
		$user = $this->servicelocator->get('usermanager')->getUser();
		if ($user) {
			$user = (object) $user;
			$fullname = $user->name;
		}
		$view->assign("fullname", $fullname);

		$privacy = $this->statushandler->get('privacy');
		if (is_null($privacy)) $privacy = 50;
		$view->assign("privacy", intval($privacy));

		return $view->loadTemplate();
	}

}
