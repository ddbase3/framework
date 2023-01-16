<?php

namespace Custom\Seminar;

use Page\Moduled\AbstractFormModuleContent;

class NeuralNetworkSeminarSketchpad extends AbstractFormModuleContent {

	private $servicelocator;
	private $accesscontrol;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
		$this->accesscontrol = $this->servicelocator->get('accesscontrol');
	}

	// Implementation of IBase

	public function getName() {
		return "neuralnetworkseminarsketchpad";
	}

	// Implementation of IPageModule

	public function getHtml() {
		$this->checkUser();

		$view = $this->servicelocator->get('view');
		$view->setTemplate('Seminar/NeuralNetworkSeminarSketchpad.php');
		$view->assign("name", $this->getName());

		$view->assign("action", $this->getUrl());
		$view->assign("continue", $this->getContinueUrl());

		return $view->loadTemplate();
	}

	// Specialization of AbstractFormModuleContent

	public function processPostData() {
		$this->checkUser();

		$userid = $this->accesscontrol->getUserId();
		$timestamp = date("YmdHis");

		$data = $_REQUEST["image"];
		list($type, $data) = explode(';', $data);
		list(, $data) = explode(',', $data);
		$data = base64_decode($data);

		$fp = fopen(DIR_LOCAL . "HandwriteTest/" . $timestamp . "-" . $userid . ".png", "w");
		fwrite($fp, $data);
		fclose($fp);

		// TODO Eingabe anzeigen in Präsi mit Erkennung (+ kleine Auswertung der Genauigkeit)
		// Anzeige-Seite auf ai.base3.de
		// letzteres holt sich die Präsentation von allein (letzte Schriftprobe nach timestamp)
		// reload in der Präsentation alle 3s (o.ä.)

	}

	// Private methods

	private function getContinueUrl() {
		return $_SERVER['REQUEST_URI'];
	}

	private function checkUser() {
		$userid = $this->accesscontrol->getUserId();
		
		if (!strlen($userid)) {
			header("Location: /");
			exit;
		}
	}

}
