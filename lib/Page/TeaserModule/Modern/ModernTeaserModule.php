<?php

namespace Page\TeaserModule\Modern;

use Page\Moduled\AbstractModuleContent;

class ModernTeaserModule extends AbstractModuleContent {

	private $servicelocator;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
	}

	public function requiresModule() {
		return array();
	}

	public function getName() {
		return "modernteasermodule";
	}

	public function getHtml() {

		// http://labs.zeroseven.de/architektur/html-kann-ganz-schoen-schraeg-sein/

		$view = $this->servicelocator->get('view');
		$view->setTemplate('Page/TeaserModule/ModernTeaserModule.php');
		foreach ($this->data as $tag => $content) $view->assign($tag, $content);
		return $view->loadTemplate();
	}

}
