<?php

/* includes */
include(__DIR__ . DIRECTORY_SEPARATOR . "defs.php");

/* error handling */
ini_set('display_errors', DEBUG ? 1 : 0);
ini_set('display_startup_errors', DEBUG ? 1 : 0);
error_reporting(DEBUG ? E_ALL | E_STRICT : 0);

/* autoloader */
require DIR_LIB . "Autoloader.php";
Autoloader::register();

/* service locator */
$servicelocator = Base3\ServiceLocator::getInstance();
$servicelocator->set('check', new Base3\Check, true);

$servicelocator->set('configuration', new Configuration\ConfigFile\ConfigFile, true);
$servicelocator->set('session', new Session\BasicSession\BasicSession, true);

$servicelocator->set('classmap', new Base3\ClassMap, true);

$servicelocator->set('view', function() { return new Base3\MvcView; });

// $servicelocator->set('serviceselector', ServiceSelector\Standard\StandardServiceSelector::getInstance(), true);
$servicelocator->set('serviceselector', ServiceSelector\LangBased\LangBasedServiceSelector::getInstance(), true);

$servicelocator->set('microservicehelper', new Microservice\Microservice\MicroserviceHelper, true);

// $servicelocator->set('scriptlock', new Scriptlock\None\ScriptlockNone, true);
$servicelocator->set('scriptlock', new Scriptlock\Base\ScriptlockBase, true);

// $servicelocator->set('logger', function() { return new Logger\FileLogger\FileLogger; });
$servicelocator->set('logger', function() { return Base3\ServiceLocator::getInstance()->get('microservicehelper')->get('Admin', 'Logger\\Api\\ILogger', 'loggermicroservice'); });

$servicelocator->set('statushandler', function() { return Base3\ServiceLocator::getInstance()->get('microservicehelper')->get('Account', 'Status\\Api\\IStatusHandler', 'statusmicroservice'); });

// $servicelocator->set('mailer', function() { new Mailer\Full\FullMailer; }, true);
$servicelocator->set('database', Database\Mysql\MysqlDatabase::getInstance(), true);
$servicelocator->set('knowledge', new Knowledge\Source\KnowledgeSource );

$servicelocator->set('desktop', function() { return Base3\ServiceLocator::getInstance()->get('microservicehelper')->get('Desktop', 'Desktop\\Api\\IDesktop', 'desktopmicroservice'); }, true);

$servicelocator->set('adviser', function() { return new Adviser\SimpleNeuralNetwork\SimpleNeuralNetwork; }, true);

$servicelocator->set('crypt', function() { return new Crypt\Openssl\OpensslCrypt; });

// $servicelocator->set('language', function() { return new Language\SingleLang\SingleLang; }, true);
$servicelocator->set('language', function() { return new Language\MultiLang\MultiLang; }, true);

// $servicelocator->set('loginpage', function() { return new Custom\Page\Login; }, true);
$servicelocator->set('loginpage', function() { return Base3\ServiceLocator::getInstance()->get('microservicehelper')->get('Account', 'Page\\Api\\IPage', 'loginpagemicroservice'); }, true);

$servicelocator->set('authtoken', function() { return new Token\FileToken\FileToken; });
$servicelocator->set('ssotoken', function() { return Base3\ServiceLocator::getInstance()->get('microservicehelper')->get('Account', 'Token\\Api\\IToken', 'authtokenmicroservice'); }, true);

$servicelocator->set('authentications', array(
	function() { return new Accesscontrol\Authentication\CliAuth; },
	function() { return new Accesscontrol\Authentication\SingleAuth; },
	function() { return new Accesscontrol\Authentication\SessionAuth; },
	function() { return new Accesscontrol\Authentication\InternalHmacAuth; },
	function() { return new Accesscontrol\Authentication\SingleSignOnAuth; },
	function() { return new Accesscontrol\Authentication\SingleSignOnAutoAuth; },
	function() { return new Accesscontrol\Authentication\ContinueAuth; }
));

$servicelocator->set('accesscontrol', new Accesscontrol\Selected\SelectedAccesscontrol, true);

$servicelocator->set('usermanager', function() { return Base3\ServiceLocator::getInstance()->get('microservicehelper')->get('Account', 'Usermanager\\Api\\IUsermanager', 'usermanagermicroservice'); }, true);

$servicelocator->set('navigation', function() { return new Custom\Navigation; }, true);
$servicelocator->set('selectservice', function() { return Base3\ServiceLocator::getInstance()->get('microservicehelper')->get('Master', 'Api\\IOutput', 'selectservicemicroservice'); }, true);
