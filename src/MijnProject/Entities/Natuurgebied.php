<?php
namespace MijnProject\Entities;
class Natuurgebied {
    private static $nrMap = array();
    
    private $id;
    private $naam;
    private $beschrijving;
    private $geo_lat;
    private $geo_long;
    private $isActief;
    private $info;
    
    
    private function __construct($id,$naam, $beschrijving, $geo_lat, $geo_long, $info, $isActief) {
             
        $this->id           =  $id;
        $this->naam         = $naam;
        $this->beschrijving = $beschrijving;
        $this->geo_lat      = $geo_lat;
        $this->geo_long     = $geo_long;
        $this->info         = $info;
        $this->isActief       = $isActief; 
    }
 
    public static function add($id,$naam, $beschrijving, $geo_lat, $geo_long, $info, $isActief) {
        if (!isset(self::$nrMap[$id])) {
            self::$nrMap[$id] = new Natuurgebied($id,$naam, $beschrijving, $geo_lat, $geo_long, $info, $isActief);
        }
        return self::$nrMap[$id];
    }
    
    public function getId()             { return $this->id; }    
   
    public function getNaam()           { return $this->naam; }  
    public function getBeschrijving()   { return $this->beschrijving; }    
    public function getGeo_lat()        { return $this->geo_lat; }  
    public function getGeo_long()       { return $this->geo_long; }  
    public function getActief()         { return $this->isActief; }
    public function getInfo()           { return $this->info; }  
   
    
    public function setId($id)                      {  $this->id = $id; }
    public function setNaam($naam)                  {  $this->naam = $naam; }
    public function setBeschrijving($beschrijving)  {  $this->beschrijving = $beschrijving; }
    public function setGeo_lat($geo_lat)            {  $this->geo_lat = $geo_lat; }
    public function setGeo_long($geo_long)          {  $this->geo_long = $geo_long; }
    public function setActief($isActief)            {  $this->isActief = $isActief; }
    public function setInfo($info)                  { $this->info = $info; }  
    
}