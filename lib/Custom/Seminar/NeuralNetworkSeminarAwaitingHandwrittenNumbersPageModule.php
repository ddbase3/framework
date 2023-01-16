<?php

namespace Custom\Seminar;

use Page\Moduled\AbstractModuleContent;

class NeuralNetworkSeminarAwaitingHandwrittenNumbersPageModule extends AbstractModuleContent {

	protected $servicelocator;
	protected $usermanager;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->usermanager = $this->servicelocator->get('usermanager');
	}

	// Implementation of IBase

	public function getName() {
		return "neuralnetworkseminarawaitinghandwrittennumberspagemodule";
	}

	// Implementation of IPageModule

	public function getHtml() {
		$view = $this->servicelocator->get('view');
		$view->setTemplate('Seminar/NeuralNetworkSeminarAwaitingHandwrittenNumbersPageModule.php');
		$view->assign("name", $this->getName());

		$user = (object) $this->usermanager->getUser();
		$admin = $user->role == "admin";
		$view->assign("admin", $admin);

		return $view->loadTemplate();
	}

}
