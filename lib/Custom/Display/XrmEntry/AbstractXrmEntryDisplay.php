<?php

namespace Custom\Display\XrmEntry;

use Custom\Display\AbstractDisplay;

abstract class AbstractXrmEntryDisplay extends AbstractDisplay {

	protected $servicelocator;

	protected $data;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
	}

	// Implementation of IOutput

	public function getOutput($out = "html") {
		$view = $this->servicelocator->get('view');
		$view->setTemplate('Display/XrmEntry/' . $this->getClassName() . '.php');
		$entry = $this->data["xrmentry"];
		$view->assign("id", $entry->id);
		$view->assign("type", $entry->type);
		$view->assign("name", $entry->name);
		$view->assign("data", $entry->data);
		$view->assign("tags", $entry->getTags());
		$view->assign("apps", $entry->getApps());
		$view->assign("xrmnames", $entry->xrmnames);
		return $view->loadTemplate();
	}

	// Implementation of IDisplay

	public function setData($data) {
		$this->data = array_merge(array(
			"xrmentry" => null
		), $data);
	}

}
