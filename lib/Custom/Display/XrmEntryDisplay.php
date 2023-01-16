<?php

namespace Custom\Display;

class XrmEntryDisplay extends AbstractDisplay {

	private $servicelocator;

	private $data;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
	}

	// Implementation of IOutput

	public function getOutput($out = "html") {

		if ($this->data["xrmentry"] == null) {
			return "XrmEntryDisplay: XRM-Eintrag nicht gefunden.";
		}

		// $entry = (object) $this->data["xrmentry"];
		$entry = \Xrm\XrmEntry::unserialize($this->data["xrmentry"]);

		$d = null;
		if ($this->data["teaser"]) {
			if ($entry->type == "document") $d = new \Custom\Display\XrmEntry\DocumentTeaserXrmEntryDisplay;
			if ($entry->type == "note") $d = new \Custom\Display\XrmEntry\NoteTeaserXrmEntryDisplay;
		} else {
			if ($entry->type == "address") $d = new \Custom\Display\XrmEntry\AddressXrmEntryDisplay;
			if ($entry->type == "code") {
				switch ($entry->data["code"]) {
					case "media":
						$d = new \Custom\Display\XrmEntry\MediaCodeXrmEntryDisplay;
						break;
					default:
						$d = new \Custom\Display\XrmEntry\CodeXrmEntryDisplay;
						break;
				}
			}
			if ($entry->type == "contact") $d = new \Custom\Display\XrmEntry\ContactXrmEntryDisplay;
			if ($entry->type == "date") $d = new \Custom\Display\XrmEntry\DateXrmEntryDisplay;
			if ($entry->type == "file") $d = new \Custom\Display\XrmEntry\FileXrmEntryDisplay;
			if ($entry->type == "folder") {
				switch ($entry->data["type"]) {
					case "date":
						$d = new \Custom\Display\XrmEntry\DateFolderXrmEntryDisplay;
						break;
					default:
						$d = new \Custom\Display\XrmEntry\FolderXrmEntryDisplay;
						break;
				}
			}
			if ($entry->type == "link") $d = new \Custom\Display\XrmEntry\LinkXrmEntryDisplay;
			if ($entry->type == "note") $d = new \Custom\Display\XrmEntry\NoteXrmEntryDisplay;
			if ($entry->type == "product") $d = new \Custom\Display\XrmEntry\ProductXrmEntryDisplay;
			if ($entry->type == "project") $d = new \Custom\Display\XrmEntry\ProjectXrmEntryDisplay;
			if ($entry->type == "resource") $d = new \Custom\Display\XrmEntry\ResourceXrmEntryDisplay;
			if ($entry->type == "tag") $d = new \Custom\Display\XrmEntry\TagXrmEntryDisplay;
			if ($entry->type == "text") $d = new \Custom\Display\XrmEntry\TextXrmEntryDisplay;
		}
		if ($d != null) {
			$d->setData(array("xrmentry" => $entry));
			return $d->getOutput();
		}

		$view = $this->servicelocator->get('view');
		$view->setTemplate('Display/XrmEntryDisplay.php');
		$view->assign("id", $entry->id);
		$view->assign("type", $entry->type);
		$view->assign("name", $entry->name);
		$view->assign("data", $entry->data);
		$view->assign("xrmnames", $entry->xrmnames);
		$view->assign("teaser", $this->data["teaser"]);

		return $view->loadTemplate();
	}

	// Implementation of IDisplay

	public function setData($data) {
		$this->data = array_merge(array(
			"xrmentry" => null,
			"teaser" => false
		), $data);
	}

}
