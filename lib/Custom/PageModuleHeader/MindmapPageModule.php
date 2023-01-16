<?php

namespace Custom\PageModuleHeader;

use Page\Moduled\AbstractModuleHeader;

class MindmapPageModule extends AbstractModuleHeader {

	public function getName() {
		return "mindmappagemodule";
	}

	public function getRequiredModules() {
		return array('jquerypagemodule');
	}

	public function getHtml() {
		$str = '<link rel="stylesheet" href="assets/mindmap/base3mindmap.css" />' . "\n";
		$str .= '<script src="assets/mindmap/base3mindmap.js"></script>';
		return $str;
	}

	public function getPriority() {
		return 50;
	}

}
