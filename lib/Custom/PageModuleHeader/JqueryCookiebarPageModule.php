<?php

namespace Custom\PageModuleHeader;

use Page\Moduled\AbstractModuleHeader;

class JqueryCookiebarPageModule extends AbstractModuleHeader {

	private $servicelocator;
	private $accesscontrol;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->accesscontrol = $this->servicelocator->get('accesscontrol');
	}

	public function getName() {
		return "jquerycookiebarpagemodule";
	}

	public function getRequiredModules() {
		return array('jquerypagemodule');
	}

	public function getHtml() {

		// nicht mehr anzeigen, wenn schon eingeloggt
		if ($this->accesscontrol->getUserId()) return "";

// TODO überarbeiten, diese Variante ist nicht mehr aktuell. Erfordert Zustimmung!!!
return "";

		return implode("\n", array(
			'<link rel="stylesheet" href="assets/jquerycookiebar/jquery.cookiebar.css" />',
			'<script src="assets/jquerycookiebar/jquery.cookiebar.js"></script>',
			'<script type="text/javascript">$(function() { $.cookieBar({}); });</script>'
		));
	}

	public function getPriority() {
		return 50;
	}
}
