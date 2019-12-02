<?php

class Models_AbstractModel{
    private $dbConnection;
    private $database;
    public function __construct(){
        $this->database = new Library_Database_Db();
    }
    public function getDb(){
        return $this->database;
    }
    public function getConnection(){
        if(!$this->dbConnection)
        {
            $this->dbConnection = $this->database->getConnection();
        }
        return $this->dbConnection;
    }

}
