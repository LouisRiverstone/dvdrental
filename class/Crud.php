<?php

require_once('DB.php');


abstract class Crud extends DB {

    protected $table;

    abstract public function create();

    public function read($id = null, $searchName = null){
        $tblId = $this->table."_id";
        if($id != null && $searchName == null){
            $sql = "SELECT * FROM $this->table WHERE $tblId = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        }else if($searchName != null && $id != null){
            $sql = "SELECT * FROM $this->table WHERE $searchName = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        }else{
            return null;
        }
    }

    public function randomRead($id = null, $searchName = null){
        $tblId = $this->table."_id";
        if($id != null && $searchName == null){
            $sql = "SELECT * FROM $this->table WHERE $tblId = :id ORDER BY RANDOM() LIMIT 1";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        }else if($searchName != null && $id != null){
            $sql = "SELECT * FROM $this->table WHERE $searchName = :id ORDER BY RANDOM() LIMIT 1";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        }else{
            return null;
        }
    }

    public function readAll($orderBy = null){

        if($orderBy == null){
            $sql  = "SELECT * FROM $this->table";
        }else{
            $sql  = "SELECT * FROM $this->table ORDER BY $orderBy";
        }
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    abstract public function update($id);

    public function delete($id){
        $tblId = $this->table."_id";
        $sql  = "DELETE FROM $this->table WHERE $tblId = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

}
