<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractModuleContent;

class PageFooter extends AbstractModuleContent{

	private $servicelocator;
	private $statushandler;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->statushandler = $this->servicelocator->get('statushandler');
	}

	public function getName() {
		return "pagefooter";
	}

	public function getHtml() {
		if (isset($_REQUEST["embed"])) return "";

		$view = $this->servicelocator->get('view');
		$view->setTemplate('PageModuleContent/PageFooter.php');

		$userid = $this->servicelocator->get('accesscontrol')->getUserId();
		$view->assign("userid", $userid);

		$privacy = $this->statushandler->get('privacy');
		if (is_null($privacy)) $privacy = 50;
		$view->assign("privacy", intval($privacy));

		return $view->loadTemplate();
	}

}
