<?php

namespace Custom;

use Page\Moduled\AbstractModuleContent;

class NeuralNetworkPageModule extends AbstractModuleContent {

	protected $servicelocator;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
	}

	// Implementation of IBase

	public function getName() {
		return "neuralnetworkpagemodule";
	}

	// Implementation of IPageModule

	public function getHtml() {
		$view = $this->servicelocator->get('view');
		$view->setTemplate('NeuralNetworkPageModule.php');
		$view->assign("name", $this->getName());
		return $view->loadTemplate();
	}

}
