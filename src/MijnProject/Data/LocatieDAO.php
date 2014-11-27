<?php

namespace MijnProject\Data;

use MijnProject\Entities\Locatie;
use PDO;

class LocatieDAO {

    public static function getAll() {
        $lijst = array();

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $query = "SELECT id, QRcode, naam, beschrijving, geo_lat,geo_long, natuurgebied_id, isActief from locatie";
        $result = $dbh->query($query);
        foreach ($result as $row) {

            $locatie = Locatie::add($row["id"], $row["QRcode"], $row["naam"],$row["beschrijving"], $row["geo_lat"], $row["geo_long"], $row["natuurgebied_id"], $row["isActief"]);
            array_push($lijst, $locatie);
        }
        $dbh = null;
        return $lijst;
    }

    public static function getById($id) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $query = "SELECT id, QRcode, naam, beschrijving, geo_lat,geo_long, natuurgebied_id, isActief from locatie WHERE id = " . $id;
        $result = $dbh->query($query);
        $row = $result->fetch();

        $locatie = Locatie::add($row["id"], $row["QRcode"], $row["naam"],$row["beschrijving"], $row["geo_lat"], $row["geo_long"], $row["natuurgebied_id"], $row["isActief"]);
        $dbh = null;
        return $locatie;
    }

    public static function getAllByNatuurgebiedId($natuurgebied_id) {
        $lijst = array();
        
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $query = "SELECT id, QRcode, naam, beschrijving, geo_lat,geo_long, natuurgebied_id, isActief from locatie WHERE natuurgebied_id = " . $natuurgebied_id;
        $result = $dbh->query($query);
        foreach ($result as $row) {
            $locatie = Locatie::add($row["id"], $row["QRcode"], $row["naam"], $row["beschrijving"], $row["geo_lat"], $row["geo_long"], $row["natuurgebied_id"], $row["isActief"]);
            array_push($lijst, $locatie);
        }
        $dbh = null;
        return $lijst;
    }

    public static function add($QRcode, $naam, $beschrijving, $geo_lat,$geo_long, $natuurgebied_id, $isActief) {
        //nieuw is actief

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $query = "INSERT INTO natuurgebied ( QRcode, naam, beschrijving, geo_lat, geo_long, natuurgebied_id, isActief) VALUES (" . $QRcode . ",'" . $naam . "', '" . $beschrijving . "', '.$geo_lat.', '.$geo_long.', " . $natuurgebied_id . ", 1)";
        $result = $dbh->exec($query);
        $dbh = null;
    }

    public static function edit($id, $naam, $beschrijving, $geo_lat, $geo_long, $info, $isActief) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $query = "UPDATE natuurgebied SET naam = '" . $naam . "', beschrijving = '" . $beschrijving . "', geo_lat = " . $geo_lat . ", geo_long = " . $geo_long . ", info= '" . $info . "', isActief = " . $isActief . "' WHERE id = " . $id;
        $result = $dbh->exec($query);
        $dbh = null;
    }

    public static function set($nr, $actief) {
        //actief toggle
        $set = ($actief == 1) ? 0 : 1;

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $query = "UPDATE natuurgebied SET isActief='" . $set . "' WHERE id = '" . $id . "'";
        $result = $dbh->exec($query);
        $dbh = null;
    }

}
