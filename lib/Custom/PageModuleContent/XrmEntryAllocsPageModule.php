<?php

namespace Custom\PageModuleContent;

use Page\Moduled\AbstractModuleContent;

class XrmEntryAllocsPageModule extends AbstractModuleContent {

	private $servicelocator;
	private $accesscontrol;
	private $xrm;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->accesscontrol = $this->servicelocator->get('accesscontrol');
		$this->xrm = $this->servicelocator->get('xrmglobal');
	}

	public function getName() {
		return "xrmentryallocspagemodule";
	}

	public function getRequiredModules() {
		return array('leafletpagemodule');
	}

	public function getHtml() {

		// open for public user
		// if (!$this->accesscontrol->getUserId()) return "";

		$id = $_REQUEST["id"];

		$entries = array();
		$filter = new \Xrm\XrmFilter("alloc", "with", $id);
		$xrmentries = array_map(
			function($e) { return (object) $e; },
			$this->xrm->getFilteredEntries($filter)
		);
		usort($xrmentries, function($a, $b) {
			if ($a->name == $b->name) return 0;
			return $a->name < $b->name ? -1 : 1;
		});
		foreach ($xrmentries as $entry) {
			if ($entry->type == "folder" && in_array("xxtacategory", $entry->alloc)) {
				$entries["category"][] = $entry;
			} else {
				$entries[$entry->type][] = $entry;
			}
		}

		$view = $this->servicelocator->get('view');
		$view->setTemplate('PageModuleContent/XrmEntryAllocsPageModule.php');
		$view->assign("entries", $entries);
		return $view->loadTemplate();
	}

}
