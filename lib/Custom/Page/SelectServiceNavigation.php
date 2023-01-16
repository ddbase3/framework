<?php

namespace Custom\Page;

use Api\IOutput;

class SelectServiceNavigation implements IOutput {

	private $servicelocator;
	private $selectservice;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->selectservice = $this->servicelocator->get('selectservice');
	}

	// Implementation of IBase

	public function getName() {
		return "selectservicenavigation";
	}

	// Implementation of IOutput

	public function getOutput($out = "html") {
		$output = $this->selectservice->getOutput();
		return $output;
	}

	public function getHelp() {
		return 'Help of SelectServiceNavigation' . "\n";
	}

}
