<?php
//controller
use MijnProject\Business\NatuurgebiedService;
use MijnProject\Business\LocatieService;
use Doctrine\Common\ClassLoader;
require_once 'Doctrine/Common/ClassLoader.php';
$classLoader = new ClassLoader('MijnProject', 'src');
$classLoader->register();
$locatieId = $_GET['locatieId'];
$locatie = LocatieService::toonLocatie($locatieId);
$ngbId = $locatie->getNatuurgebied_id();                        //natuurgebied waarvan locatie deel uitmaakt
$natuurgebied = NatuurgebiedService::toonNatuurgebied($ngbId);

require_once 'libraries/Twig/Autoloader.php';
Twig_Autoloader::register();

$fileLoader = new Twig_Loader_Filesystem('src/MijnProject/Presentation');
$twig = new Twig_Environment($fileLoader);
print $twig->render('LocatieDetail.php', array ('Locatie' => $locatie,'Natuurgebied'=>$natuurgebied));
?>