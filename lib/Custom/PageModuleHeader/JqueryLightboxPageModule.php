<?php

namespace Custom\PageModuleHeader;

use Page\Moduled\AbstractModuleHeader;

class JqueryLightboxPageModule extends AbstractModuleHeader {

	public function getName() {
		return "jquerylightboxpagemodule";
	}

	public function getRequiredModules() {
		return array('jquerypagemodule');
	}

	public function getHtml() {
		return implode("\n", array(
			'<script type="text/javascript" src="assets/jquerylightbox/lib/jquery.mousewheel.pack.js"></script>',
			'<link rel="stylesheet" type="text/css" href="assets/jquerylightbox/source/jquery.fancybox.css?v=2.1.7" media="screen" />',
			'<script type="text/javascript" src="assets/jquerylightbox/source/jquery.fancybox.pack.js?v=2.1.7"></script>',
			'<script type="text/javascript">$(function() { $("a[rel*=lightbox]").fancybox(); });</script>'
		));
	}

	public function getPriority() {
		return 50;
	}
}
