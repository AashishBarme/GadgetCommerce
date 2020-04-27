<?php
declare (strict_types=1);

namespace GadgetCommerce\Core\Application\Entity;

class Orders {
        public int $Id;
        public int $ProductId;
        public int $CustomerId;
        public string $PaymentMethod;
        public string $ShippingAddress;
        public string $BillingAddress;
        public int $OrderStatus;
}