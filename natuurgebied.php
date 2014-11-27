<?php

use Doctrine\Common\ClassLoader;
use MijnProject\Business\LocatieService;
use MijnProject\Business\NatuurgebiedService;

require_once 'Doctrine/Common/ClassLoader.php';
$classLoader = new ClassLoader('MijnProject', 'src');
$classLoader->register();

$natuurgebied = (integer)$_GET['natId'];

$natuurgebiedinfo = NatuurgebiedService::toonNatuurgebied($natuurgebied);

$locatielijst = LocatieService::toonLocatiesPerNatuurgebied($natuurgebied);

require_once 'libraries/Twig/Autoloader.php';
Twig_Autoloader::register();

$fileLoader = new Twig_Loader_Filesystem('src/MijnProject/Presentation');
$twig = new Twig_Environment($fileLoader);
print $twig->render('LocatieLijst.php', array('locatielijst' => $locatielijst, 'natuurgebiedinfo' => $natuurgebiedinfo));
?>