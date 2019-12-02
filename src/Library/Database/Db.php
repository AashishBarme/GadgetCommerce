<?php
//write mysqli connect
class Library_Database_Db
{
    private $link = null;
    public function __construct(){
        $this->link = mysqli_connect(HOSTNAME,DBUSER,DBPASSWORD,DBNAME);
        if (!$this->link) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
    }
    public function getConnection(){
        return $this->link;
    }
    public function query($sql){
         return mysqli_query($this->link,$sql);
    }

    public function fetchAll($sql){
        $resource = $this->query($sql);
        $list = [];
        while($row = mysqli_fetch_object($resource))
        {
            $list[] =$row;
        }
        return $list;
    }
}
