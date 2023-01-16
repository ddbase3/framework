<?php

namespace Custom\PageModuleHeader;

use Page\Moduled\AbstractModuleHeader;

class LeafletPageModule extends AbstractModuleHeader {

	public function getName() {
		return "leafletpagemodule";
	}

	public function getHtml() {
		$lines[] = '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>';
		$lines[] = '<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>';

		return implode("\n", $lines);
	}

	public function getPriority() {
		return 50;
	}

}
