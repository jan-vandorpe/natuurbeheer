<?php
namespace MijnProject\Business;
use MijnProject\Data\LocatieDAO;

class LocatieService {
    public static function toonLocatiesPerNatuurgebied($natuurgebied_id) {
        $lijst = LocatieDAO::getAllByNatuurgebiedId($natuurgebied_id);
        return $lijst;
    }

    public static function toonLocatie($id) {
        $locatie = LocatieDAO::getById($id);
        return $locatie;
    }
  
    public static function bewerkLocatie($id, $QRcode, $naam, $beschrijving, $geo_lat, $geo_long, $natuurgebied_id, $isActief) {
        LocatieDAO::edit($id, $QRcode, $naam, $beschrijving, $geo_lat, $geo_long, $natuurgebied_id, $isActief);
    }
    
    public static function voegToe($id, $QRcode, $naam, $beschrijving, $geo_lat, $geo_long, $natuurgebied_id, $isActief) {
        // nieuw niet noodzakelijk actief
        LocatieDAO::add($id, $QRcode, $naam, $beschrijving, $geo_lat, $geo_long, $natuurgebied_id, $isActief);
    }

    public static function set($id, $actief) {
        //actie: 1/0
        LocatieDAO::set($id, $actief);
    }    
}