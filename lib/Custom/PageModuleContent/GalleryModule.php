<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractModuleContent;

class GalleryModule extends AbstractModuleContent {

	private $servicelocator;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
	}

	public function getName() {
		return "gallerymodule";
	}

	public function getRequiredModules() {
		return array('jquerylightboxpagemodule');
	}

	public function getHtml() {
		$view = $this->servicelocator->get('view');
		$view->setTemplate('PageModuleContent/GalleryModule.php');
		$defaults = array("images" => array());
		foreach ($defaults as $tag => $default) $view->assign($tag, isset($this->data[$tag]) ? $this->data[$tag] : $default);
		foreach ($this->data as $tag => $content) $view->assign($tag, $content);
		return $view->loadTemplate();
	}

}
