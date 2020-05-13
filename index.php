<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include __DIR__."/vendor/autoload.php";

/**
 * 1. Database independent
 * 2. Api
 * 3. Add a cache layer any where
 * 4. unit testing can be done in isolation
 */


$pdo = PdoConnection();
$Repo = new \GadgetCommerce\Core\Infrastructure\Persistence\Repositories\ProductRepository($pdo);
$Service = new \GadgetCommerce\Core\Application\Services\ProductService($Repo);

$entity = new \GadgetCommerce\Core\Application\Entity\Product;
$entity->CategoryId = 2;
$entity->ProductName = "Beta Test Product";
$entity->ProductSlug = "test-product";
$entity->ProductPrice = "500";
$entity->ProductSku = "BTEST12";
$entity->ProductImage = "BTest.jpg";
$entity->Id = 2;
$operation = $Service->Get($entity->Id);

var_dump($operation);


function PdoConnection()
{
    $servername = "localhost";
    $username = "admin";
    $password = "65403";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=GadgetCommerce", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    return $conn;
    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    // echo "Connection failed: " . $e->getMessage();
    }
}


