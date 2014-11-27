<?php

include_once('/libraries/qrcodelib/qrlib.php');
use Doctrine\Common\ClassLoader;
use MijnProject\Business\LocatieService;


require_once 'Doctrine/Common/ClassLoader.php';
$classLoader = new ClassLoader('MijnProject', 'src');
$classLoader->register();

$natuurgebied = (integer)$_GET['natId'];

$locatielijst = LocatieService::toonLocatiesPerNatuurgebied($natuurgebied);

//genereer QRcode png
foreach ($locatielijst as $locatie) {
  QRcode::png("http://192.168.1.140/natuurbeheer/locatiedetail.php?locId=".$locatie->getId(),'img/'.$locatie->getId().'.png', QR_ECLEVEL_L, 3);
}

require_once 'libraries/Twig/Autoloader.php';
Twig_Autoloader::register();

$fileLoader = new Twig_Loader_Filesystem('src/MijnProject/Presentation');
$twig = new Twig_Environment($fileLoader);
print $twig->render('LocatieLijstQRcodes.php', array('locatielijst' => $locatielijst));
?>