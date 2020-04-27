<?php declare(strict_types=1);

namespace GadgetCommerce\Core\Application\Interfaces\Repository;
use GadgetCommerce\Core\Application\Entity\Admin;
interface IAdminRepository
{
    public function Create(Admin $entity) : Admin ;
    public function Update(Admin $entity) : Admin ;
    public function Delete(Admin $entity) : int ;
    /**
     * Undocumented function
     *
     * @return Admin[]
     */
    public function List() :array;
    public function ListActive() :array;
    public function Get(int $id) :Admin;
    
}