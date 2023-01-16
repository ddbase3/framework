<?php

namespace Custom\NeuralNetworkDisplay;

use Custom\Display\AbstractDisplay;

class RasterNeuralNetworkDisplay extends AbstractDisplay {

	private $data;

	// Implementation of IOutput

	public function getOutput($out = "html") {
		$svg = '';
		if ($this->data["neuralnetwork"] != null) $svg = $this->createSvg($this->data["neuralnetwork"]);
		return $svg;
	}

	// Implementation of IDisplay

	public function setData($data) {
		$this->data = array_merge(array(
			"neuralnetwork" => null
		), $data);
	}

	// Private methods

	private function createSvg($nn) {
		$lw = 250;
		$s = 10;

		$h = $s * 10 + 100;

		$svg = '<svg version="1.1" width="' . (sizeof($nn->layers) * $lw) . '" height="' . $h . '">';
		$svg .= '<g stroke="black" stroke-width="1">';

		for ($i = 1; $i < sizeof($nn->layers); $i++) {
			$x = $i * $lw;
			$svg .= '<line x1="' . ($x - 50) . '" y1="' . ($h/4) . '" x2="' . ($x + 50) . '" y2="' . ($h/4) . '" />';
			$svg .= '<line x1="' . ($x - 50) . '" y1="' . ($h*3/4) . '" x2="' . ($x + 50) . '" y2="' . ($h*3/4) . '" />';
		}

		for ($i = 0; $i < sizeof($nn->layers); $i++) {
			$lx = $i * $lw;
			$cnt = 0;
			for ($j = 0; $j < sizeof($nn->layers[$i]->neurons); $j++) {
				if ($nn->layers[$i]->neurons[$j]->bias) continue;
				$col = 'rgb(100%, 100%, 50%)';
				$v = $nn->layers[$i]->neurons[$j]->value;
				if ($v !== null) {
					$c = max(0, min(100, $v * 100));
					$col = 'rgb(' . $c . '%, ' . $c . '%, ' . $c . '%)';
				}
				$x = $lx + floor($cnt/10) * 10 + $lw/2 - ceil(sizeof($nn->layers[$i]->neurons)/10) / 2 * 10;
				$y = ($cnt % 10) * $s + 100 - 50;
				$svg .= '<rect x="' . $x . '" y="' . $y . '" width="' . $s . '" height="' . $s . '" fill="' . $col . '" stroke="black"></rect>';
				$cnt++;
			}
		}

		$svg .= '</g>';
		$svg .= '</svg>';

		return $svg;
	}

}
