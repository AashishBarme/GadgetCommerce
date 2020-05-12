<?php declare(strict_types=1);

namespace GadgetCommerce\Core\Application\Services;
use GadgetCommerce\Core\Application\Entity\Admin;
use GadgetCommerce\Core\Application\Interfaces\Services\IAdminService;
use GadgetCommerce\Core\Application\Interfaces\Repository\IAdminRepository;
use GadgetCommerce\Core\Application\Exceptions\ServiceException;
class AdminService implements IAdminService
{
    private $Repository;
    public function __construct(IAdminRepository $repository = null)
    {
        if($repository !== null )
        {
            $this->Repository = $repository;
        }
    }

    public function Create(Admin $entity) : Admin 
    {
        //TODO: if not alphanumeric throw service exception
        
        return $this->Repository->Create($entity) ;
    }
    public function Update(Admin $entity) : Admin 
    {
        return $entity;
    }
    public function Delete(Admin $entity) : int 
    {
        return  0;
    }
    /**
     * Undocumented function
     *
     * @return Admin[]
     */
    public function List() :array
    {
        return [];
    }
    
    public function ListActive() :array
    {
        return [];
    }
    public function Get(int $id) :Admin
    {
        return new Admin();
    }

    
}