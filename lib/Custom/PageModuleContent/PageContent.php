<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractModuleContent;

class PageContent extends AbstractModuleContent {

	private $servicelocator;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
	}

	public function getName() {
		return "pagecontent";
	}

	public function getHtml() {
		$view = $this->servicelocator->get('view');
		$view->setTemplate('PageModuleContent/PageContent.php');
		$defaults = array("content" => "", "background" => "none");
		foreach ($defaults as $tag => $default) $view->assign($tag, isset($this->data[$tag]) ? $this->data[$tag] : $default);
		foreach ($this->data as $tag => $content) $view->assign($tag, $content);
		return $view->loadTemplate();
	}

}
