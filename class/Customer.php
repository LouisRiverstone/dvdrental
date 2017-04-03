<?php

require_once("Crud.php");

class Customer extends Crud
{
    protected $table = "customer";
    private $customerId;
    private $storeId;
    private $firstName;
    private $lastName;
    private $email;
    private $addressId;
    private $activeBool;
    private $createDate;
    private $lastUpdate;
    private $active;
    private $login;
    private $password;

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    public function getStoreId()
    {
        return $this->storeId;
    }


    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;
    }


    public function getFirstName()
    {
        return $this->firstName;
    }


    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }


    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getAddressId()
    {
        return $this->addressId;
    }


    public function setAddressId($addressId)
    {
        $this->addressId = $addressId;
    }


    public function getActiveBool()
    {
        return $this->activeBool;
    }

    public function setActiveBool($activeBool)
    {
        $this->activeBool = $activeBool;
    }

    public function getCreateDate()
    {
        return $this->createDate;
    }

    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    function getDatetimeNow() {
        $tz_object = new DateTimeZone('Brazil/East');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d\ h:i:s');
    }


    public function create()
    {

        $sql  = "INSERT INTO $this->table (store_id,first_name,last_name,email,address_id,activebool,create_date,last_update,active,login,password) VALUES (:store_id ,:first_name, :last_name ,:email, :address_id , :activebool , :create_date , :last_update ,:active: , :login , :password)";
        $stmt = self::prepare($sql);
        $stmt->bindParam(':store_id', $this->storeId);
        $stmt->bindParam(':first_name', $this->firstName);
        $stmt->bindParam(':last_name', $this->lastName);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':address_id', $this->addressId);
        $stmt->bindParam(':activebool', $this->activeBool);
        $stmt->bindParam(':create_date', $this->getDatetimeNow());
        $stmt->bindParam(':last_update', $this->getDatetimeNow());
        $stmt->bindParam(':active', $this->active);
        $stmt->bindParam(':login', $this->login);
        $stmt->bindParam(':password', $this->password);
        return $stmt->execute();
    }

    public function update($id)
    {
        $sql  = "UPDATE $this->table SET store_id = :store_id ,first_name = :first_name , last_name = :lastname ,email = :email ,address_id = :address_id ,activebool = :activebool ,create_date = :create_date,last_update = :last_update ,active = :active ,login = :login ,password = :password WHERE customer_id = :customer_id";
        $stmt = self::prepare($sql);
        $stmt->bindParam(':store_id', $this->storeId);
        $stmt->bindParam(':first_name', $this->firstName);
        $stmt->bindParam(':last_name', $this->lastName);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':address_id', $this->addressId);
        $stmt->bindParam(':activebool', $this->activeBool);
        $stmt->bindParam(':create_date', $this->createDate);
        $stmt->bindParam(':last_update', $this->getDatetimeNow());
        $stmt->bindParam(':active', $this->active);
        $stmt->bindParam(':login', $this->login);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':customer_id', $id);
        return $stmt->execute();
    }




}