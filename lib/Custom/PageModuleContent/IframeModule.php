<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractModuleContent;

class IframeModule extends AbstractModuleContent {

	private $servicelocator;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
	}

	public function getName() {
		return "iframemodule";
	}

	public function getHtml() {
		$view = $this->servicelocator->get('view');
		$view->setTemplate('PageModuleContent/IframeModule.php');
		$defaults = array("url" => "", "height" => "20em", "allow" => "");
		foreach ($defaults as $tag => $default) $view->assign($tag, isset($this->data[$tag]) ? $this->data[$tag] : $default);
		return $view->loadTemplate();
	}

}
