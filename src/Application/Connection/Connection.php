<?php


namespace App\Application\Actions;


use PDO;
use PDOException;

class Connection
{

    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName     = "db_restaurantly";

    public function __construct(){
        if(!isset($this->db)){
            try{
                $conn = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUsername, $this->dbPassword);
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db = $conn;
            }catch(PDOException $e){
                die("Failed to connect with MySQL: " . $e->getMessage());
            }
        }
    }

    public function getData($sql){
        $stmt = $this->db->query($sql);
        $data = [];
        while($row = $stmt->fetch(PDO::FECHT_OBJ)){
            $data[] = $row;
        }
        return $data;
    }

}