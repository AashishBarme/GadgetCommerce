<?php declare(strict_types=1);

namespace GadgetCommerce\Core\Application\Interfaces\Services;
use GadgetCommerce\Core\Application\Entity\Orders;
use GadgetCommerce\Core\Application\Interfaces\Repository\IOrderRepository;
interface IOrdersService {

    public function Create(Orders $entity): Orders;
    public function Update(Orders $entity): Orders;
    public function Delete(Orders $entity): int;
    public function List(): array;
    public function Get(int $id ): Orders;
}
