<?php
namespace MijnProject\Business;
use MijnProject\Data\NatuurgebiedDAO;

class NatuurgebiedService {
    public static function toonAlleNatuurgebieden() {
        $lijst = NatuurgebiedDAO::getAll();
        return $lijst;
    }

    public static function toonKlant($nr) {
        $klant = KlantDAO::getByNr($nr);
        return $klant;
    }
    
    public static function emailKlant($email) {
        $klant = KlantDAO::getByEmail($email);
        return $klant;
    }

    public static function bewerkKlant($id, $email, $pass, $naam, $voornaam, $adres, $postid) {
        KlantDAO::edit($id, $email, $pass, $naam, $voornaam, $adres, $postid, $actief);
    }
    
    public static function voegKlantToe($email, $pass, $naam, $voornaam, $adres, $postid, $actief) {
        KlantDAO::add($email, $pass, $naam, $voornaam, $adres, $postid, $actief);
    }

    public static function schakelKlant($nr, $actief) {
        KlantDAO::set($nr, $actief);
    }    
}