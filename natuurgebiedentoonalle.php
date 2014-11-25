<?php
use MijnProject\Business\NatuurgebiedService;
use Doctrine\Common\ClassLoader;
require_once 'Doctrine/Common/ClassLoader.php';
$classLoader = new ClassLoader('MijnProject', 'src');
$classLoader->register();
$natuurgebiedlijst = NatuurgebiedService::toonAlleNatuurgebieden();

require_once 'libraries/Twig/Autoloader.php';
Twig_Autoloader::register();

$fileLoader = new Twig_Loader_Filesystem('src/MijnProject/Presentation');
$twig = new Twig_Environment($fileLoader);
print $twig->render('NatuurgebiedLijst.php', array ('natuurgebiedlijst' => $natuurgebiedlijst));
?>