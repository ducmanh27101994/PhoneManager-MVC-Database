<?php
namespace Module2\Model;
use PDO;
class DatabaseConnect
{
    protected $dsn;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->dsn='mysql:host=localhost;dbname=PhoneManager;charset=utf8';
        $this->username='leducmanh';
        $this->password='leducmanh';
    }

    function connectDB(){
        $connectDB = NULL;
        $connectDB = new PDO($this->dsn,$this->username,$this->password);
        return $connectDB;
    }

}