<?php

namespace Custom\Display\XrmEntry;

class DateFolderXrmEntryDisplay extends AbstractXrmEntryDisplay {

	// Implementation of IOutput

	public function getOutput($out = "html") {

		$xrm = $this->servicelocator->get('xrmglobal');

		$id = $this->data["xrmentry"]->id;

		$entries = array();
		$f1 = new \Xrm\XrmFilter("alloc", "with", $id);
		$f2 = new \Xrm\XrmFilter("type", "eq", "date");
		$filter = new \Xrm\XrmFilter("conj", "and", array($f1, $f2));
		$xrmentries = array_map(
			function($e) { return (object) $e; },
			$xrm->getFilteredEntries($filter)
		);
		usort($xrmentries, function($a, $b) {
			if ($a->name == $b->name) return 0;
			return $a->name < $b->name ? -1 : 1;
		});

		$this->data["xrmentry"]->data["dates"] = $xrmentries;
		return parent::getOutput($out);
	}

}
