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
$catRepo = new \GadgetCommerce\Core\Infrastructure\Persistence\Repositories\CategoryRepository($pdo);
$catService = new \GadgetCommerce\Core\Application\Services\CategoryService($catRepo);

$entity = new \GadgetCommerce\Core\Application\Entity\Category;
$entity->Name = "Test";
$entity->Slug = "test-books";
$entity->Description = "Description";
$entity->Id = 3;
$operation = $catService->List();

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


