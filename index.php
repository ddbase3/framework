<?php

include("inc" . DIRECTORY_SEPARATOR . "init.php");

$servicelocator = Base3\ServiceLocator::getInstance();
$serviceselector = $servicelocator->get('serviceselector');
$serviceselector->go();
