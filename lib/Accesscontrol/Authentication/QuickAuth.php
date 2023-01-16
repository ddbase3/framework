<?php

namespace Accesscontrol\Authentication;

use Accesscontrol\AbstractAuth;
use Api\ICheck;

class QuickAuth extends AbstractAuth {

	private $servicelocator;

	public function __construct($id = null) {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
	}

	// Implementation of IBase

	public function getName() {
		return "quickauth";
	}

	// Implementation of IAuthentication

	public function login() {
		if (!isset($_REQUEST["u"]) || !isset($_REQUEST["ch"])) return null;
		if (sha1($_REQUEST["u"] . "aJ3w!Q6Zcno87-a2etD,fr1g#a+w7e-F3op") != $_REQUEST["ch"]) return null;
		return $_REQUEST["u"];
	}

}
