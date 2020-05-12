<?php
declare(strict_types=1);
namespace GadgetCommerce\Core\Application\Interfaces\Services;

use GadgetCommerce\Core\Application\Interfaces\Repository\ICustomerRepository;
use GadgetCommerce\Core\Application\Entity\Customer;

interface ICustomerService{

    public function Create(Customer $enity): Customer;
    public function Update(Customer $entity): Customer;
    public function Delete(Customer $entity): int;
    public function List(): array;
    public function Get(int $id): Customer;
    public function GetNamePassword(int $id): Customer;
}
