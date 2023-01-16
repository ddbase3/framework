<?php

namespace Custom;

use Api\IOutput;

class NeuralNetworkGraphic2 implements IOutput {

	// Implementation of IBase

	public function getName() {
		return "neuralnetworkgraphic2";
	}

	// Implementation of IOutput

	public function getOutput($out = "html") {
		if ($out != "svg") return;

		////////////////////////////////////////////////////////////////////////////////
		// Daten einlesen

		$indata = array();
		$dirs = array(
			"20191219113238-ddahme",
			"20191219114936-ddahme",
			"20191219115038-ddahme",
			"20191219115048-ddahme",
			"20191219115100-ddahme"
		);
		foreach ($dirs as $d) for ($f=0; $f<=9; $f++) {
			$in = array();
			$imagefile = DIR_LOCAL . "HandwrittenNumbers/" . $d . "/" . $f . ".png";
			$img = imagecreatefrompng($imagefile);
			$img = imagescale($img, 10, 10);
			for ($i=0; $i<10; $i++) for ($j=0; $j<10; $j++) {
				$rgb = imagecolorat($img, $i, $j);
				$colors = imagecolorsforindex($img, $rgb);
				$in[] = $colors["alpha"]/127;
			}
			imagedestroy($img);
			$indata[$d][$f] = $in;
		}

		////////////////////////////////////////////////////////////////////////////////
		// NN erstellen

		$nn = new \Util\NeuralNetwork\NeuralNetwork(array(
			"layers" => array(100, 70, 40, 10),
			"bias" => true,
			"epsilon" => 1
		));

		////////////////////////////////////////////////////////////////////////////////
		// Training

		for ($i = 0; $i < 30; $i++) {
			foreach ($indata as $set) {
				foreach ($set as $number => $in) {
					$out = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
					$out[intval($number)] = 1;
					$nn->train($in, $out);
				}
			}
		}

		////////////////////////////////////////////////////////////////////////////////
		// Test 1

/*
		foreach ($indata as $set) {
			foreach ($set as $number => $in) {
				$outdata = $nn->predict($in);
				$maxs = array_keys($outdata, max($outdata));
				echo json_encode($maxs);
			}
echo "<br>";
		}
exit;
*/

		////////////////////////////////////////////////////////////////////////////////
		// Test 2

/*
for ($p=0; $p<=9; $p++) {
		$in = array();
		$imagefile = DIR_LOCAL . "HandwrittenNumbers/20191219115100-ddahme/" . $p . ".png";
		$img = imagecreatefrompng($imagefile);
		$img = imagescale($img, 10, 10);
		for ($i=0; $i<10; $i++) for ($j=0; $j<10; $j++) {
			$rgb = imagecolorat($img, $i, $j);
			$colors = imagecolorsforindex($img, $rgb);
			$in[] = floatval($colors["alpha"])/127;
		}
		imagedestroy($img);
		$outdata = $nn->predict($in);
		$maxs = array_keys($outdata, max($outdata));
echo $p . " - " . json_encode($maxs) . "<br>";
}
exit;
*/

		////////////////////////////////////////////////////////////////////////////////
		// Test 3

		$in = array();

		$testnum = isset($_REQUEST["n"]) ? $_REQUEST["n"] : 3;
		$dir = isset($_REQUEST["s"]) ? $_REQUEST["s"] : 4;

		$imagefile = DIR_LOCAL . "HandwrittenNumbers/" . $dirs[$dir] . "/" . $testnum . ".png";
		$img = imagecreatefrompng($imagefile);
		$img = imagescale($img, 10, 10);
		for ($i=0; $i<10; $i++) for ($j=0; $j<10; $j++) {
			$rgb = imagecolorat($img, $i, $j);
			$colors = imagecolorsforindex($img, $rgb);
			$in[] = floatval($colors["alpha"])/127;
		}
		imagedestroy($img);
		$outdata = $nn->predict($in);

		////////////////////////////////////////////////////////////////////////////////
		// Ausgabe

		$d = new \Custom\NeuralNetworkDisplay\RasterNeuralNetworkDisplay;
		$d->setData(array("neuralnetwork" => $nn));
		return $d->getOutput();
	}

	public function getHelp() {
		return 'Help of NeuralNetworkGraphic2' . "\n";
	}

}
