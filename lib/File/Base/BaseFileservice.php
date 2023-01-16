<?php

namespace File\Base;

use File\Api\IFileservice;

class BaseFileservice implements IFileservice {

	// TODO check: was ist mit access control ?!?!?!?!?!??!

	// Implementation of IFileservice

	public function getContents($filename, $base64 = false) {
		$content = file_get_contents($this->getFullPath($filename));
		return $base64 ? base64_encode($content) : $content;
	}

	public function getFiles($dir) {
		return $this->scan($dir);
	}

	// Private methods

	private function getFullPath($filename) {
		return DIR_USERFILES . ltrim($filename, DIRECTORY_SEPARATOR);
	}

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
						"items" => array()				// depricated
//						"items" => $this->scan($base, $dir . '/' . $f)	// Recursively get the contents of the folder
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
