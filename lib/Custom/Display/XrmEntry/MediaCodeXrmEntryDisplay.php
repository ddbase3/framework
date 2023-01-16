<?php

namespace Custom\Display\XrmEntry;

class MediaCodeXrmEntryDisplay extends AbstractXrmEntryDisplay {

	// Implementation of IOutput

	public function getOutput($out = "html") {

		$id = $this->data["xrmentry"]->id;
		$path = "mnt/nextcloud/" . substr($id, 0, 2) . "/" . substr($id, 2, 2) . "/" . $id;
		$files = $this->scan(DIR_USERFILES . $path);

		$this->data["xrmentry"]->data["path"] = $path;
		$this->data["xrmentry"]->data["files"] = json_encode($files);
		return parent::getOutput($out);
	}

	// Private functions

	private function scan($base, $dir = ""){
		$files = array();
		// Is there actually such a folder/file?
		if(file_exists($base . "/" . $dir)){
			foreach(scandir($base . "/" . $dir) as $f) {
				if(!$f || $f[0] == '.') {
					continue; // Ignore hidden files
				}
				if(is_dir($base . "/" . $dir . '/' . $f)) {
					// The path is a folder
					$files[] = array(
						"name" => $f,
						"type" => "folder",
						"path" => $dir . '/' . $f,
						"items" => array()
//						"items" => $this->scan($base, $dir . '/' . $f) // Recursively get the contents of the folder
					);
				} else {
					// It is a file
					$files[] = array(
						"name" => $f,
						"type" => "file",
						"path" => $dir . '/' . $f,
						"size" => filesize($base . "/" . $dir . '/' . $f) // Gets the size of this file
					);
				}
			}
		}
		return $files;
	}

}
