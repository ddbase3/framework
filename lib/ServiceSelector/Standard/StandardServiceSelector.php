<?php

namespace ServiceSelector\Standard;

use ServiceSelector\Api\IServiceSelector;
use Api\ICheck;

class StandardServiceSelector implements IServiceSelector, ICheck {

	private static $instance;

	private function __construct() {
		if (php_sapi_name() != "cli") return;
		$options = getopt("", array("app:", "name:", "out:"));
	        if (isset($options["app"])) $_REQUEST["app"] = $_GET["app"] = $options["app"];
        	if (isset($options["name"])) $_REQUEST["name"] = $_GET["name"] = $options["name"];
	        if (isset($options["out"])) $_REQUEST["out"] = $_GET["out"] = $options["out"];
	}

	private function __clone() {}
 	private function __wakeup() {}

	public static function getInstance() {
		if (self::$instance === null) self::$instance = new self();
		return self::$instance;
	}

	// Implementation of IServiceSelector

	public function go() {
		$classmap = \Base3\ServiceLocator::getInstance()->get('classmap');
		$configuration = $servicelocator->get('configuration');
		$accesscontrol = $servicelocator->get('accesscontrol');

		$out = $_REQUEST['out'] = isset($_REQUEST['out']) && strlen($_REQUEST['out']) ? $_REQUEST['out'] : 'html';
		$data = $_REQUEST['data'] = isset($_REQUEST['data']) && strlen($_REQUEST['data']) ? $_REQUEST['data'] : '';
		$name = $_REQUEST['name'] = isset($_REQUEST['name']) && strlen($_REQUEST['name']) ? $_REQUEST['name'] : 'index';

		$url = $configuration->get('base')["url"];
		$intern = $configuration->get('base')["intern"];
		if (strlen($accesscontrol->getUserId()) && strlen($intern) && $name == "index") {
			header("Location: " . $url . $intern);
			exit;
		}

		$instance = strlen($app)
			? $classmap->getInstanceByAppInterfaceName($app, "Api\\IPublic", $name)
			: $classmap->getInstanceByInterfaceName("Api\\IPublic", $name);
		if ($instance == null) {
			$instances = $classmap->getInstancesByInterface("Page\\Api\\IPageCatchall");
			$instances = $classmap->getInstancesByInterface("Page\\Api\\IPageCatchall");
			$instance = reset($instances);
		}

		switch (true) {

			case !is_object($instance):
				header("HTTP/1.0 404 Not Found");
				die("404 Not Found\n");

			case $out == "help":
				echo $instance->getHelp();
				exit;

			default:
				if ($out == "json") header('Content-Type: application/json');
				echo $instance->getOutput($out);
				exit;
		}
	}

	// Implementation of ICheck

	public function checkDependencies() {
		$servicelocator = \Base3\ServiceLocator::getInstance();
		return array(
			"depending_services" => $servicelocator->get('classmap') == null ? "Fail" : "Ok"
		);
	}
}

/*
// .htaccess:

<files *.ini>
order deny,allow
deny from all
</files>

RewriteEngine On
RewriteRule ^assets/ - [L]
RewriteRule ^tpl/ - [L]
RewriteRule ^userfiles/ - [L]
RewriteRule ^favicon.ico - [L]
RewriteRule ^robots.txt - [L]
RewriteRule ^$ index.html
RewriteRule ^(.+)/(.+)\.(.+) index.php?app=$1&name=$2&out=$3 [L,QSA]
RewriteRule ^(.+)\.(.+) index.php?app=&name=$1&out=$2 [L,QSA]

*/