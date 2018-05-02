<?php
/**
 * Created by PhpStorm.
 * User: MCANTOR
 * Date: 4/30/2018
 * Time: 6:45 PM
 */

namespace AppBundle\Model\Dao;


use AppBundle\Entity\Producto;
use AppBundle\Model\Dao\Interfaces\IProductoDao;
use Doctrine\ORM\EntityManager;

class ProductoDao implements IProductoDao
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * ProductoDao constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function findAll()
    {
        return $this->em
            ->createQuery('SELECT p FROM AppBundle:Producto p ORDER BY p.name ASC')
            ->getResult();
    }

    public function findByProduct(Producto $producto)
    {
        return $this->em->find(Producto::class)->find($producto);
    }

    public function saveProduct(Producto $producto)
    {
        if (!$producto->getId()) {
            $this->em->persist($producto);
        } else {
            $this->em->merge($producto);
        }
        $this->em->flush();
    }

    public function deleteProduct(Producto $producto)
    {
        $this->em->remove($producto);
        $this->em->flush();
    }
}