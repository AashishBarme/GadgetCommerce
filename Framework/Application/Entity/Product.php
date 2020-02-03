<?php 
declare(strict_types=1);

namespace GadgetCommerce\Core\Application\Entity;

class Product{
    public int $Id;
    public int $CategoryId;
    public string $ProductName;
    public string $ProductSlug;
    public string $ProductSku;
    public float $ProductPrice;
    public string $ProductImage; 
}
