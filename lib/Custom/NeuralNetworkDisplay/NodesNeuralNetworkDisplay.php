<?php

namespace Custom\NeuralNetworkDisplay;

use Custom\Display\AbstractDisplay;

class NodesNeuralNetworkDisplay extends AbstractDisplay {

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
		$lh = 80;
		$a = .18;

		$maxn = 0;
		for ($i = 1; $i < sizeof($nn->layers); $i++)	{
			$n = sizeof($nn->layers[$i]->neurons);
			if ($n > $maxn) $maxn = $n;
		}
		$dh = $maxn * $lh;

		$svg = '<svg version="1.1" width="' . (sizeof($nn->layers) * $lw) . '" height="' . $dh . '">';
		$svg .= '<g stroke="black" stroke-width="1">';

		for ($i = 1; $i < sizeof($nn->layers); $i++) {
			$x1 = $i * $lw + $lw/2;
			$x2 = $x1 - $lw;
			for ($j = 0; $j < sizeof($nn->layers[$i]->neurons); $j++) {
				if ($nn->layers[$i]->neurons[$j]->bias) continue;
				for ($k = 0; $k < sizeof($nn->layers[$i - 1]->neurons); $k++) {
					$y1 = $j * $lh + $dh/2 - ((sizeof($nn->layers[$i]->neurons) - 1) / 2 * $lh);
					$y2 = $k * $lh + $dh/2 - ((sizeof($nn->layers[$i - 1]->neurons) - 1) / 2 * $lh);
					$svg .= '<line x1="' . $x1 . '" y1="' . $y1 . '" x2="' . $x2 . '" y2="' . $y2 . '" />';
				}
			}
			for ($j = 0; $j < sizeof($nn->layers[$i]->neurons); $j++) {
				if ($nn->layers[$i]->neurons[$j]->bias) continue;
				for ($k = 0; $k < sizeof($nn->layers[$i - 1]->neurons); $k++) {
					$y1 = $j * $lh + $dh/2 - ((sizeof($nn->layers[$i]->neurons) - 1) / 2 * $lh);
					$y2 = $k * $lh + $dh/2 - ((sizeof($nn->layers[$i - 1]->neurons) - 1) / 2 * $lh);
					$x = $x1 - ($x1 - $x2) * $a;
					$y = $y1 - ($y1 - $y2) * $a + 4;
					$weight = $nn->layers[$i]->neurons[$j]->inweights[$k]->weight;
					$w = $weight === null ? " - " : number_format($weight, 2);
					$svg .= '<rect x="' . ($x - 15) . '" y="' . ($y - 9) . '" width="30" height="11" fill="white" stroke="black"></rect>';
					$svg .= '<text x="' . $x . '" y="' . $y . '" text-anchor="middle" font-family="Arial" font-size="10">' . $w . '</text>';
				}
			}
		}

		for ($i = 0; $i < sizeof($nn->layers); $i++) {
			$cx = $i * $lw + $lw/2;
			for ($j = 0; $j < sizeof($nn->layers[$i]->neurons); $j++) {
				$cy = $j * $lh + $dh/2 - ((sizeof($nn->layers[$i]->neurons) - 1) / 2 * $lh);
				$col = 'rgb(100%, 100%, 50%)';
				$v = $nn->layers[$i]->neurons[$j]->value;
				if ($v !== null) {
					$c = max(0, min(100, $v * 100));
					$col = 'rgb(' . $c . '%, ' . $c . '%, ' . $c . '%)';
				}
				$svg .= '<circle cx="' . $cx . '" cy="' . $cy . '" r="10" fill="' . $col . '" />';
				if ($nn->layers[$i]->neurons[$j]->bias) $svg .= '<text x="' . $cx . '" y="' . ($cy - 13) . '" text-anchor="middle" font-family="Arial" font-size="10">BIAS</text>';
				$svg .= '<text x="' . $cx . '" y="' . ($cy + 20) . '" text-anchor="middle" font-family="Arial" font-size="10">' . number_format($v, 2) . '</text>';
			}
		}

		$svg .= '</g>';
		$svg .= '</svg>';

		return $svg;
	}

}
