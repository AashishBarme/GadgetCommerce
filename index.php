<?php 
include __DIR__."/vendor/autoload.php";

/**
 * 1. Database independent
 * 2. Api
 * 3. Add a cache layer any where
 * 4. unit testing can be done in isolation
 */

$adminRepo = new \GadgetCommerce\Core\Infrastructure\Persistence\Repositories\AdminRepository();
$adminService = new \GadgetCommerce\Core\Application\Services\AdminService($adminRepo);

for($i=0; $i<10; $i++)
{

    $entity = new \GadgetCommerce\Core\Application\Entity\Admin;
    $entity->Username = "abcd GHWPJDCSAKLn '" . $i;
    
    $entity = $adminService->Create($entity);
    
    var_dump($entity);
}

