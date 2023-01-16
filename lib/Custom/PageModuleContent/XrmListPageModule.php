<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractModuleContent;

class XrmListPageModule extends AbstractModuleContent {

	private $servicelocator;
	private $accesscontrol;
	private $xrm;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->accesscontrol = $this->servicelocator->get('accesscontrol');
		$this->xrm = $this->servicelocator->get('xrm');
	}

	public function getName() {
		return "xrmlistpagemodule";
	}

	public function getHtml() {
		if (!$this->accesscontrol->getUserId()) return "";

		$view = $this->servicelocator->get('view');
		$view->setTemplate('PageModuleContent/XrmListPageModule.php');

		$filter = new \Xrm\XrmFilter;
		$filter->fromData($this->data["filter"]);

		$entries = $this->xrm->getFilteredEntries($filter);

		foreach ($entries as $k => $entry) $entries[$k] = (object) $entry;

//		usort($entries, function ($a, $b) { return ($a->name <=> $b->name); });
		usort($entries, function ($a, $b) {
			if ($a->name == $b->name) return 0;
			return $a->name < $b->name ? -1 : 1;
		});

		$view->assign("entries", $entries);

		return $view->loadTemplate();
	}

}
