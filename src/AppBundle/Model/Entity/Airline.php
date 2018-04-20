<?php
/**
 * Created by PhpStorm.
 * User: MCANTOR
 * Date: 4/20/2018
 * Time: 3:01 PM
 */

namespace AppBundle\Model\Entity;


class Airline
{
    private $name;
    private $cost;

    /**
     * Airline constructor.
     * @param $name
     * @param $cost
     */
    public function __construct($name=null, $cost=null)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return null
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param null $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    public function __toString()
    {
        return $this->name . ": valor precio actual en la bolsa de comercio a ". $this->cost;
    }


}