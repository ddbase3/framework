<?php

namespace Custom\PageModuleHeader;

use Page\Moduled\AbstractModuleHeader;

class JqueryLazyPageModule extends AbstractModuleHeader {

	private $servicelocator;
	private $accesscontrol;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->accesscontrol = $this->servicelocator->get('accesscontrol');
	}

	public function getName() {
		return "jquerylazypagemodule";
	}

	public function getRequiredModules() {
		return array('jquerypagemodule');
	}

	public function getHtml() {
		return implode("\n", array(
			'<script src="assets/jquerylazy/jquery.lazy.min.js"></script>',
			'<script type="text/javascript">$(function() { $(".lazy").Lazy(); });</script>'
		));
	}

	public function getPriority() {
		return 50;
	}
}
