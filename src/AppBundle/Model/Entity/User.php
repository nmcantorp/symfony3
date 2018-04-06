<?php
/**
 * Created by PhpStorm.
 * User: MCANTOR
 * Date: 4/6/2018
 * Time: 5:04 PM
 */

namespace AppBundle\Model\Entity;


class User
{

    private $id;
    private $name;
    private $lastName;

    /**
     * User constructor.
     * @param $id
     * @param $name
     * @param $lastName
     */
    public function __construct($id, $name, $lastName)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }


}