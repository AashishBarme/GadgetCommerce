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

$cartRepo = new \GadgetCommerce\Core\Infrastructure\Persistence\Repositories\CartRepository();
$cartService = new \GadgetCommerce\Core\Application\Services\CartService($cartRepo);

for($i=0; $i<3; $i++)
{

    $entity = new \GadgetCommerce\Core\Application\Entity\Cart;
    $entity->CartId = $i;
    $entity->ProductId = $i;
    $entity->Quantity = $i;
    $entity->CustomerId = $i;
    
    $entity = $cartService->Create($entity);
    
    echo '<pre>';
    var_dump($entity);
    echo '</pre>';
}

