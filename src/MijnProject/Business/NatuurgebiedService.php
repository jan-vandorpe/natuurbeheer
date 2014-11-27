<?php
namespace MijnProject\Business;
use MijnProject\Data\NatuurgebiedDAO;

class NatuurgebiedService {
    public static function toonAlleNatuurgebieden() {
        $lijst = NatuurgebiedDAO::getAll();
        return $lijst;
    }

    public static function toonNatuurgebied($id) {
        $klant = NatuurgebiedDAO::getById($id);
        return $klant;
    }
  

    public static function bewerkNatuurgebied($id, $naam, $beschrijving, $geo_lat, $geo_long, $info, $isActief) {
        NatuurgebiedDAO::edit($id, $naam, $beschrijving, $geo_lat, $geo_long, $info, $isActief);
    }
    
    public static function voegToe($naam, $beschrijving, $geo_lat, $geo_long, $info) {
        // nieuw = actief
        NatuurgebiedDAO::add($naam, $beschrijving, $geo_lat, $geo_long, $info);
    }

    public static function set($id, $actief) {
        //actie: 1/0
        NatuurgebiedDAO::set($id, $actief);
    }    
}