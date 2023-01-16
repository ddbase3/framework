<?php

namespace Custom\Microservice;

use Page\Api\IPage;
use Microservice\AbstractMicroservice;

/* only if this microservice offers a page service */
class HomepageMicroservice extends AbstractMicroservice implements IPage {

	private $cnf;

	public function __construct() {
		$servicelocator = \Base3\ServiceLocator::getInstance();
		$this->cnf = $servicelocator->get('configuration')->get('base');
	}

	// Implementation of IPage

	public function getUrl() {
		return $this->cnf["url"] . $this->cnf["intern"];
	}

}
