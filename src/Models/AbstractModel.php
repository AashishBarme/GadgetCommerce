<?php
use src\Interfaces\IAbstract;
class Models_AbstractModel 
{
    private $DbConnection;
    private $Database;
    public function __construct(){
        $this->Database = new Library_Database_Db();
    }
    public function getDb(){
        return $this->Database;
    }
    public function getConnection(){
        if(!$this->DbConnection)
        {
            $this->DbConnection = $this->Database->getConnection();
        }
        return $this->DbConnection;
    }

}
