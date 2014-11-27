<?php
//controller

use Doctrine\Common\ClassLoader;
use MijnProject\Business\LocatieService;
use MijnProject\Business\NatuurgebiedService;

require_once 'Doctrine/Common/ClassLoader.php';
$classLoader = new ClassLoader('MijnProject', 'src');
$classLoader->register();

$locatieId = $_GET['locId'];
$locatie = LocatieService::toonLocatie($locatieId);
$ngbId = $locatie->getNatuurgebied_id();                        //natuurgebied waarvan locatie deel uitmaakt
//var_dump($locatie);

$natuurgebied = NatuurgebiedService::toonNatuurgebied($ngbId);

require_once 'libraries/Twig/Autoloader.php';
Twig_Autoloader::register();

$fileLoader = new Twig_Loader_Filesystem('src/MijnProject/Presentation');
$twig = new Twig_Environment($fileLoader);
print $twig->render('locatiedetail.php', array ('Locatie' => $locatie, 'Natuurgebied'=> $natuurgebied));
?>