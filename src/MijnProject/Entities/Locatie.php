<?php
namespace MijnProject\Entities;

class Locatie {
    private static $nrMap = array();
    
    private $id;
    private $natuurgebied_id;
    private $QRcode;
    private $naam;
    private $beschrijving;
    private $geo_lat;
    private $geo_long;
    private $isActief;
   
    
    
    private function __construct($id, $QRcode, $naam, $beschrijving, $geo_lat, $geo_long, $natuurgebied_id, $isActief) {
             
        $this->id               = $id;
        $this->QRcode           = $QRcode;
         $this->naam            = $naam;
        $this->beschrijving     = $beschrijving;
        $this->geo_lat          = $geo_lat;
        $this->geo_long         = $geo_long;
        $this->natuurgebied_id  = $natuurgebied_id;
        $this->isActief         = $isActief; // 1/0
    }
 
    public static function add($id, $QRcode, $naam, $beschrijving, $geo_lat, $geo_long, $natuurgebied_id, $isActief) {
        if (!isset(self::$nrMap[$id])) {
            self::$nrMap[$id] = new Locatie($id, $QRcode, $naam, $beschrijving, $geo_lat, $geo_long, $natuurgebied_id, $isActief);
        }
        return self::$nrMap[$id];
    }
    
    public function getId()             { return $this->id; }    
   
    public function getQRcode()         { return $this->QRcode; }
    public function getNaam()           { return $this->naam; }  
    public function getBeschrijving()   { return $this->beschrijving; }    
    public function getGeo_lat()        { return $this->geo_lat; }  
    public function getGeo_long()       { return $this->geo_long; }  
    public function getActief()         { return $this->isActief; }
    public function getNatuurgebied_id(){ return $this->natuurgebied_id; }  
   
    
    public function setId($id)                      {  $this->id = $id; }
    public function setQRcode($QRcode)              {  $this->QRcode = $QRcode; }
    public function setNaam($naam)                  {  $this->naam = $naam; }
    public function setBeschrijving($beschrijving)  {  $this->beschrijving = $beschrijving; }
    public function setGeo_lat($geo_lat)            {  $this->geo_lat = $geo_lat; }
    public function setGeo_long($geo_long)          {  $this->geo_long = $geo_long; }
    public function setActief($isActief)            {  $this->isActief = $isActief; }
    public function setNatuurgebied_id($natuurgebied_id){  $this->natuurgebied_id = $natuurgebied_id; }  
    
}