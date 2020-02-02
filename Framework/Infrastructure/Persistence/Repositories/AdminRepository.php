<?php declare(strict_types=1);

namespace GadgetCommerce\Core\Infrastructure\Persistence\Repositories;

use GadgetCommerce\Core\Application\Interfaces\Repository\IAdminRepository;
use GadgetCommerce\Core\Application\Entity\Admin;

class AdminRepository implements IAdminRepository
{
    private $lastId=0;
    private $Db;
    private $Collection;
    public function __construct($db= null)
    {
        $this->Db = $db;
        $this->Collection = [];
    }
    public function Create(Admin $entity) : Admin 
    {
        
        $entity->Id = ++$this->lastId;
        $this->Collection[$entity->Id] = $entity;
        return  $entity;
    }
    public function Update(Admin $entity) : Admin 
    {
        foreach($this->Collection as $item)
        {
            if($item->Id == $entity->Id)
            {
                $item->Username = $entity->Username;
            }
        }
        return $entity;
    }
    public function Delete(Admin $entity) : int 
    {
       unset($this->Collection[$entity->Id]);
        return 0;
    }
    /**
     * Undocumented function
     *
     * @return Admin[]
     */
    public function List() :array
    {
        return $this->Collection;
    }
    public function ListActive() :array
    {
        return  $this->Collection;
    }
    public function Get(int $id) :Admin
    {
        $entity = null;
        foreach($this->Collection as $item)
        {
            if($item->Id == $id)
            {
                return $item;
            }
        }
       
        return $entity;
    }
}