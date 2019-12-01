<?php
define("HOSTNAME",'localhost');
define("DBNAME",'GadgetCommerce');
define("DBUSER",'admin');
define("DBPASSWORD",'65403');

//$link = mysqli_connect("HOSTNAME", "DBUSER", "DBPASSWORD", "DBNAME");
$link = mysqli_connect(HOSTNAME,DBUSER,DBPASSWORD,DBNAME);
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
