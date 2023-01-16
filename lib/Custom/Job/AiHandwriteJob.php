<?php

namespace Custom\Job;

use Worker\Api\IJob;

class AiHandwriteJob implements IJob {

	private $servicelocator;
	private $desktop;
	private $logger;

	public function __construct($cnf = null) {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->desktop = $this->servicelocator->get('desktop');
		$this->logger = $this->servicelocator->get('logger');
	}

	// Implementation of IBase

	public function getName() {
		return "aihandwritejob";
	}

	// Implementation of IJob

	public function isActive() {
		return true;
	}

	public function getPriority() {
		return 1;
	}

	public function go() {
		$msg = "aihandwritejob: ";
		$msg .= $this->getDesktopResults();
		$this->logger->log("ai", json_encode(array("msg" => $msg . "done")));
		return $msg . "done";
	}

	// Private methods

	private function getDesktopResults() {
		$msg = "";

		$results = $this->desktop->getResults("aihandwrite");
		foreach ($results as $taskid => $r) {
			$result = (object) $r;

			// gesetzt sein müssen:
			// userid
			// processid (from date: YmdHis)
			// number (0-9)
			// image (stream)

			$data = $result->image;
			list($type, $data) = explode(';', $data);
			list(, $data) = explode(',', $data);
			$data = base64_decode($data);

			$dir = DIR_LOCAL . "HandwrittenNumbers/" . $result->processid . "-" . $result->userid . "/";
			if (!is_dir($dir)) mkdir($dir, 0777);
			$fp = fopen($dir . intval($result->number) . ".png", "w");
			fwrite($fp, $data);
			fclose($fp);

			$msg .= "(" . $result->userid . "|" . $result->number . ") ";

			$this->desktop->removeTask($taskid);
		}
		if (sizeof($results)) $msg .= sizeof($results) . " Task(s) verarbeitet. ";

		return $msg;
	}

}
