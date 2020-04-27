<?php
declare(strict_types=1);

namespace GadgetCommerce\Core\Application\Entity;

class Cart{
    public int $CartId;
    public int $ProductId;
    public int $Quantity;
    public int $CustomerId;
}