<?php

namespace Custom\Seminar;

use Api\IOutput;

class NeuralNetworkSeminarAwaitingHandwrittenNumbersService implements IOutput {

	// Implementation of IBase

	public function getName() {
		return "neuralnetworkseminarawaitinghandwrittennumbersservice";
	}

	// Implementation of IOutput

	public function getOutput($out = "html") {
		if ($out != "json") return;

		$result = array();

		$today = date("Ymd");
		$dir = DIR_LOCAL . "HandwrittenNumbers/";
		$handle = opendir($dir);
		while (($file = readdir($handle)) !== false) {
			if (!is_dir($dir . $file) || $file == "." || $file == "..") continue;
			if (substr($file, 0, 8) != $today) continue;
			$parts = explode("-", $file);
			$data = array("processid" => $parts[0], "userid" => $parts[1], "numbers" => array());
			for ($i=0; $i<=9; $i++) $data["numbers"][$i] = file_exists($dir . $file . "/" . $i . ".png") ? 1 : 0;
			$result[] = $data;
		}

		return json_encode($result);
	}

	public function getHelp() {
		return 'Help of NeuralNetworkSeminarAwaitingHandwrittenNumbersService' . "\n";
	}

}
