<?php

namespace Base3;

/**
 * Dependency Injector.
 * Hier werden alle von der Anwendung global verfügbare Dienste hinterlegt.
 */
class ServiceLocator {

	private static $instance;
	private $container = array();
 
	private function __construct() {}
 
	private function __clone() {}
 	private function __wakeup() {}

	public static function getInstance() {
		if (self::$instance === null) self::$instance = new self();
		return self::$instance;
	}

	/**
	 * Get list of registered service names
	 */
	public function getServiceList() {
		$list = array();
		foreach ($this->container as $name => $_) $list[] = $name;
		return $list;
	}

	/**
	 * Einen Service hinterlegen.
	 * @param string                       $name            Name des Service.
	 * @param string|object|callable|array $classDefinition Definition wie die Instanz zu erstellen ist. Kann ein Klassenname oder eine Funktion sein. Auch Array möglich (Instanzen werden nicht erzeugt).
	 * @param bool                         $shared          Gibt es nur eine Instanz für alle, oder bekommt jeder eine eigene.
	 */
	public function set($name, $classDefinition, $shared = false) {
		$this->container[$name] = (object) array('def' => $classDefinition, 'shared' => $shared, 'instance' => null);
	}

	/**
	 * Prüft, ob ein Name vergeben ist für einen Service
	 * (isset ist bereits vergeben von PHP)
	 * @return bool
	 */
	public function has($name) {
		return array_key_exists($name, $this->container);
	}

	/**
	 * Einen Service abrufen.
	 * @param string $name
	 * @return object
	 */
	public function get($name) {

		if (!isset($this->container[$name])) {
			return null;
			// because classmap needs to instatiate classes without errors to get names
			// throw new \RuntimeException('Requested service "' . $name . '" not defined.');
		}
 
		$service = $this->container[$name];

		if (is_array($service->def)) {
			// Array direkt durchgeben, keine Instanzen erzeugen
			return $service->def;
		}

		if (!$service->shared) {
			// Wird nicht gemeinsam verwendet, also immer eine neue Instanz erstellen.
			return $this->createInstance($service->def, false);
		}
 
		if ($service->instance === null) {
			// Service wurde bisher noch nicht angefordert, also neue Instanz erstellen.
			$service->instance = $this->createInstance($service->def, true);
		}
 
		return $service->instance;
	}

	/**
	 * Erstellt eine Instanz der Klasse.
	 * @param string|object|callable $definition
	 * @param bool                   $shared
	 * @return object
	 */
	private function createInstance($definition, $shared) {

		if (is_callable($definition)) {
			// Benutzer hat eine Funktion hinterlegt, die die Klasse erstellt.
			return $definition();
		}
 
		if (is_string($definition)) {
			// Einfacher Klassenname
			return new $definition;
		}
 
		if (is_object($definition)) {
			return $shared ? $definition : new $definition;
		}

		throw new \RuntimeException('Malformed service definition!');
	}
}


/*


// examples 1 (create):

$di = DI::getInstance();

// Hinterlegen einer Instanz der Klasse; Service wird gemeinsam verwendet
$di->set('memcache', new \Project\Library\MyMemcache(), true);

// Hinterlegen eines Klassennamens. Nützlich, wenn der Konstruktor keine Argumente benötigt und die Klasse nicht oft verwendet wird.
$di->set('cache', '\Project\Library\MyXCache');

// Defintion mit einer Funktion. Nützlich, wenn die Instanzierung teuer oder komplizierter ist.
// Da in der gesamten Anwendung die selbe Datenbankverbindung genutzt werden soll, setzten wir shared auf true.
$di->set('db', function () {
	return new \PDO('mysql:dbname=testdb;host=127.0.0.1', 'root', '123');
}, true);


// example 2 (use):

class IndexController {
	public function indexAction() {
		$cache = DI::getInstance()->get('cache');
		// ...
	}
}


*/
