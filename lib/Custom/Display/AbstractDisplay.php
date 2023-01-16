<?php

namespace Custom\Display;

use Api\IDisplay;

abstract class AbstractDisplay implements IDisplay {

	protected function getClassName() {
		$parts = explode("\\", get_class($this));
		return array_pop($parts);
	}

	// Implementation of IBase

	public function getName() {
		return strtolower($this->getClassName());
	}

	// Implementation of IOutput

	public function getHelp() {
		return 'Help of ' . $this->getClassName() . "\n";
	}

}
