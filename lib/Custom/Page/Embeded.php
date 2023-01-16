<?php

namespace Custom\Page;

use Api\IOutput;

class Embeded implements IOutput {

	// Implementation of IBase

	public function getName() {
		return "embeded";
	}

	// Implementation of IOutput

	public function getOutput($out = "html") {
		return "Done.";
	}

	public function getHelp() {
		return 'Help of Embeded' . "\n";
	}

}
