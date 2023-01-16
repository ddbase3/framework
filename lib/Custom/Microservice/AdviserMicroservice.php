<?php

namespace Custom\Microservice;

use Adviser\Api\IAdviser;
use Microservice\AbstractMicroservice;

class AdviserMicroservice extends AbstractMicroservice implements IAdviser {

	private $adviser;

	public function __construct() {
		$servicelocator = \Base3\ServiceLocator::getInstance();
		$this->adviser = $servicelocator->get('adviser');
	}

	// Implementation of IAdviser

}
