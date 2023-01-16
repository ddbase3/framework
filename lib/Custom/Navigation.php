<?php

namespace Custom;

use Api\IOutput;

class Navigation implements IOutput {

	protected $servicelocator;
	private $view;
	private $accesscontrol;
	private $usermanager;

	private $tpldir = "";

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->view = $this->servicelocator->get('view');
		$this->accesscontrol = $this->servicelocator->get('accesscontrol');
		$this->usermanager = $this->servicelocator->get('usermanager');
	}

	// Implementation of IBase

	public function getName() {
		return "navigation";
	}

	// Implementation of IOutput

	public function getOutput($out = "html") {
		$this->view->setTemplate($this->tpldir . 'Navigation.php');
		$this->view->assign("authenticated", !!$this->accesscontrol->getUserId());

		$user = $this->usermanager->getUser();
		$this->view->assign("user", $user == null ? null : (object) $user);

		return $this->view->loadTemplate();
	}

	public function getHelp() {
		return 'Help of Navigation' . "\n";
	}

}
