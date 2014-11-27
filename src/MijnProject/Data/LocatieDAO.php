<?php

namespace MijnProject\Data;

use MijnProject\Entities\Locatie;
use PDO;

class LocatieDAO {

    public static function getAll() {
        $lijst = array();

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $query = "SELECT id, naam, beschrijving, geo_lat,geo_long, info, isActief from natuurgebied";
        $result = $dbh->query($query);
        foreach ($result as $row) {

            $natuurgebied = Natuurgebied::add($row["id"], $row["naam"], $row["beschrijving"], $row["geo_lat"], $row["geo_long"], $row["info"], $row["isActief"]);
            array_push($lijst, $natuurgebied);
        }
        $dbh = null;
        return $lijst;
    }

    public static function getById($id) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $query = "SELECT id, naam, beschrijving, geo_lat,geo_long, info, isActief from natuurgebied WHERE id = " . $id;
        $result = $dbh->query($query);
        $row = $result->fetch();

        $natuurgebied = Natuurgebied::add($row["id"], $row["naam"], $row["beschrijving"], $row["geo_lat"], $row["geo_long"], $row["info"], $row["isActief"]);
        $dbh = null;
        return $natuurgebied;
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

    public static function add($naam, $beschrijving, $geo_lat, $geo_long, $info) {
        //niuew is actief

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $query = "INSERT INTO natuurgebied ($naam, $beschrijving, $geo_lat, $geo_long, $info, $isActief) VALUES ('" . $naam . "', '" . $beschrijving . "', '.$geo_lat.', '.$geo_long.'', '" . $info . "', 1)";
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
