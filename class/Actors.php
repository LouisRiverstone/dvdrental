<?php

require_once("Crud.php");

class Actors extends Crud {
    protected $table = "actor";
    private $first_name;
    private $last_name;
    private $last_update;
    private $actor_id;

    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function getActorId()
    {
        return $this->actor_id;
    }

    public function setActorId($actor_id)
    {
        $this->actor_id = (int)$actor_id;
    }

    public function setLastUpdate()
    {
        $this->last_update = $this->getDatetimeNow();
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getLastUpdate()
    {
        return $this->last_update;
    }

    function getDatetimeNow() {
        $tz_object = new DateTimeZone('Brazil/East');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d\ h:i:s');
    }

    public function create()
    {
        $sql  = "INSERT INTO $this->table (first_name,last_name,last_update) VALUES (:first_name, :last_name , :last_update)";
        $stmt = self::prepare($sql);
        $stmt->bindParam(':first_name', $this->first_name);
        $stmt->bindParam(':last_name', $this->last_name);
        $stmt->bindParam(':last_update', $this->last_update);
        return $stmt->execute();
    }

    public function update($id)
    {
        $sql  = "UPDATE $this->table SET first_name = :first_name, last_name = :last_name ,last_update = :last_update WHERE id = :id";
        $stmt = self::prepare($sql);
        $stmt->bindParam(':first_name', $this->first_name);
        $stmt->bindParam(':last_name', $this->last_name);
        $stmt->bindParam(':last_update', $this->last_update);
        return $stmt->execute();
    }

}