<?php
/**
 * Created by PhpStorm.
 * User: MCANTOR
 * Date: 4/30/2018
 * Time: 6:36 PM
 */

namespace AppBundle\Model\Dao\Interfaces;


use AppBundle\Entity\Producto;

interface IProductoDao
{
    public function findAll();

    public function findByProduct(Producto $producto);

    public function saveProduct(Producto $producto);

    public function deleteProduct(Producto $producto);

}