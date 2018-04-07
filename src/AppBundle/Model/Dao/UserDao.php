<?php
/**
 * Created by PhpStorm.
 * User: mauri
 * Date: 07/04/2018
 * Time: 12:34
 */

namespace AppBundle\Model\Dao;


use AppBundle\Model\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

class UserDao
{
    private $users;
    public function __construct()
    {
        $this->users = new \ArrayObject();
        $this->users->append(new User(1, 'prueba1', 'apellido1', 'prueba1.appelido1@correo.com'));
        $this->users->append(new User(2, 'prueba2', 'apellido2', 'prueba2.appelido2@correo.com'));
        $this->users->append(new User(3, 'prueba3', 'apellido3', 'prueba3.appelido3@correo.com'));
        $this->users->append(new User(4, 'prueba4', 'apellido4', 'prueba4.appelido4@correo.com'));
        $this->users->append(new User(5, 'prueba5', 'apellido5', 'prueba5.appelido5@correo.com'));
        $this->users->append(new User(6, 'prueba6', 'apellido6', 'prueba6.appelido6@correo.com'));
        $this->users->append(new User(7, 'prueba7', 'apellido7', 'prueba7.appelido7@correo.com'));
        $this->users->append(new User(8, 'prueba8', 'apellido8', 'prueba8.appelido8@correo.com'));
        $this->users->append(new User(9, 'prueba9', 'apellido9', 'prueba9.appelido9@correo.com'));
        $this->users->append(new User(10, 'prueba10', 'apellido10', 'prueba11.appelido11@correo.com'));
        $this->users->append(new User(11, 'prueba11', 'apellido11', 'prueba12.appelido12@correo.com'));
        $this->users->append(new User(12, 'prueba12', 'apellido12', 'prueba13.appelido13@correo.com'));
        $this->users->append(new User(13, 'prueba13', 'apellido13', 'prueba14.appelido14@correo.com'));
        $this->users->append(new User(14, 'prueba14', 'apellido14', 'prueba15.appelido15@correo.com'));
        $this->users->append(new User(15, 'prueba15', 'apellido15', 'prueba16.appelido16@correo.com'));
        $this->users->append(new User(16, 'prueba16', 'apellido16', 'prueba17.appelido17@correo.com'));
        $this->users->append(new User(17, 'prueba17', 'apellido17', 'prueba18.appelido18@correo.com'));
    }

    public function findAllUser()
    {
        return $this->users;
    }

    public function findUserById($id)
    {
        $usersCollection = new ArrayCollection($this->users->getArrayCopy());
        $userResult = [];
        $usersCollection->forAll(function ($index, $record) use ($id, &$userResult) {
            if($record->getId() == $id)
            {
                $userResult = $record;
            }
            return true;
        });

        return $userResult;
    }

    public function findByName($name)
    {
        $usersCollection = new ArrayCollection($this->users->getArrayCopy());
        $userResult = [];
        $usersCollection->forAll(function ($index, $record) use ($name, &$userResult) {
            if($record->getName() == $name)
            {
                $userResult = $record;
            }
            return true;
        });

        return $userResult;
    }
}