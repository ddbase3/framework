<?php

namespace Custom\Page;

use Page\Api\IPage;
use Api\ICheck;

class SingleSignOn implements IPage, ICheck {

	private $servicelocator;
	private $loginpage;
	private $language;
	private $cnf;

	public function __construct($cnf = null) {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->loginpage = $this->servicelocator->get('loginpage');
		$this->language = $this->servicelocator->get('language');
		$this->cnf = $this->servicelocator->get('configuration')->get('base');
	}

	// Implementation of IBase

	public function getName() {
		return "singlesignon";
	}

	// Implementation of IOutput

	public function getUrl() {
		return $this->getName() . ".php";
	}

	public function getOutput($out = "html") {
		$ssocont = strlen($this->cnf["intern"])
			? $this->cnf["url"] . $this->cnf["intern"]
			: ( isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $this->cnf["url"] );
		$url = $this->loginpage->getUrl();
		$url .= ( strpos($url, "?") === false ? "?" : "&" ) . "ssocont=" . urlencode($ssocont) . "&data=" . $this->language->getLanguage();
		session_write_close();
		header('Location: ' . $url);
		exit;
	}

	public function getHelp() {
		return 'Help of SingleSignOn' . "\n";
	}

	// Implementation of ICheck

	public function checkDependencies() {
		return array(
			"depending_services" => $this->loginpage == null ? "Fail" : "Ok"
		);
	}

}
