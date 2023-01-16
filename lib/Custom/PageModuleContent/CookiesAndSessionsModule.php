<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractModuleContent;
use Page\Api\IPage;

class CookiesAndSessionsModule extends AbstractModuleContent implements IPage {

	private $servicelocator;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
	}

	// Implementation of IBase

	public function getName() {
		return "cookiesandsessionsmodule";
	}

	// Implementation of IPageModule

	public function getHtml() {
		$view = $this->servicelocator->get('view');
		$view->setTemplate('PageModuleContent/CookiesAndSessionsModule.php');
		$view->assign("name", $this->getName());
		$view->assign("session", $_SESSION);
		$view->assign("cookie", $_COOKIE);
		return $view->loadTemplate();
	}

	// Implementation of IPage

	public function getUrl() {
		return "cookiesandsessionsmodule.php";
	}

	public function getOutput($out = "html") {
		$this->handleRequest();
		header('Location: ' . $_SERVER["HTTP_REFERER"]);
		exit;
	}

	public function getHelp() {
		return 'Help of CookiesAndSessionsModule' . "\n";
	}

	// private methods

	private function handleRequest() {
		if (!isset($_REQUEST["delete"])) return;
		foreach ($_SESSION as $key => $val) {
			if (!isset($_REQUEST["session|" . $key])) continue;
			unset($_SESSION[$key]);
		}
		foreach ($_COOKIE as $key => $val) {
			if (!isset($_REQUEST["cookie|" . $key])) continue;
			setcookie($key, "", time() - 3600 * 24);
		}
	}

}
