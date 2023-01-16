<?php

namespace Custom;

use Api\IOutput;

class NeuralNetworkGraphic implements IOutput {

	// Implementation of IBase

	public function getName() {
		return "neuralnetworkgraphic";
	}

	// Implementation of IOutput

	public function getOutput($out = "html") {
		if ($out != "svg") return;

		$nn = new \Util\NeuralNetwork\NeuralNetwork(array(
			"layers" => array(2, 3, 6),
			"bias" => true
		));

		for ($i = 0; $i < 5000; $i++) {
			$nn->train(array(0, 0), array(1, 0, 0, 0, 0, 0));
			$nn->train(array(0, 1), array(1, 1, 0, 0, 0, 1));
			$nn->train(array(1, 0), array(1, 1, 1, 0, 0, 1));
			$nn->train(array(1, 1), array(1, 1, 1, 1, 0, 0));
		}

		$a = isset($_REQUEST["a"]) ? $_REQUEST["a"] : 1;
		$b = isset($_REQUEST["b"]) ? $_REQUEST["b"] : 0;

		$nn->predict(array($a, $b));

		$d = new \Custom\NeuralNetworkDisplay\NodesNeuralNetworkDisplay;
		// $d = new \Custom\NeuralNetworkDisplay\RasterNeuralNetworkDisplay;
		$d->setData(array("neuralnetwork" => $nn));
		return $d->getOutput();
	}

	public function getHelp() {
		return 'Help of NeuralNetworkGraphic' . "\n";
	}

}
