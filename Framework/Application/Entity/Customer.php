<?php
declare(strict_types=1);

namespace GadgetCommerce\Core\Application\Entity;

class Customer{
        public int $Id;
        public string $FirstName;
        public string $LastName;
        public string $UserName;
        public string $Password;
        public string $LastLogin;
        public float $LastLoginIp;
}