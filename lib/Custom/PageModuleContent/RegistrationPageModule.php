<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractFormModuleContent;

class RegistrationPageModule extends AbstractFormModuleContent {

	private $servicelocator;
	private $language;
	private $usermanager;
	private $database;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->language = $this->servicelocator->get('language');
		$this->usermanager = $this->servicelocator->get('usermanager');
		$this->database = $this->servicelocator->get('database');
	}

	// Implementation of IPageModule

	public function getHtml() {

		$view = $this->servicelocator->get('view');
		$view->setTemplate('PageModuleContent/RegistrationPageModule.php');

		$view->assign("action", $this->getUrl());
		$view->assign("continue", $this->getContinueUrl());

		$view->assign("language", $this->language->getLanguage());

		return $view->loadTemplate();
	}

	// Specialization of AbstractFormModuleContent

	public function processPostData() {

		if (!isset($_REQUEST["userid"]) && !isset($_REQUEST["password"])) return;

		if (!isset($_REQUEST["ch1"]) && !isset($_REQUEST["ch2"])) return;
		if ($_REQUEST["ch1"] != '' || $_REQUEST["ch2"] != '387fw5') return;

		// TODO check for missing/wrong data
		$userid = $_REQUEST["userid"];
		$password = $_REQUEST["password"];
		// data valid for BASE3 CMS
		$data = array(
			"firstname" => $_REQUEST["firstname"],
			"surname" => $_REQUEST["surname"],
			"email" => $_REQUEST["email"],
			"language" => $_REQUEST["language"]
		);

		$this->database->connect();

		$sql = "INSERT INTO `base3system_sysuser` SET
				`name` = '" . $this->database->escape($userid) . "',
				`password` = '" . md5($password) . "',
				`fullname` = '" . $this->database->escape($data["firstname"] . " " . $data["surname"]) . "',
				`email` = '" . $this->database->escape($data["email"]) . "',
				`lang_id` = 2,
				`mode` = 0";	// TODO zurück auf 0 setzen, wenn Eva sich registriert hat
		$this->database->nonQuery($sql);
		$id = $this->database->insertId();

		// $this->usermanager->registUser($userid, $password, $data);
	}

	// Private methods

	private function getContinueUrl() {
		return $_SERVER['REQUEST_URI'];
	}

	public function getForwardUrl() {
		return $_SERVER["HTTP_REFERER"] . "?done";
	}

}
