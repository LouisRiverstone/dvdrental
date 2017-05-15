<?php

require_once("Crud.php");

class Rental extends Crud {
    protected $table = "rental";
    

    function getDatetimeNow() {
        $tz_object = new DateTimeZone('Brazil/East');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d\ h:i:s');
    }

    public function create()
    {
     
    }

    public function update($id)
    {
        
    }

}