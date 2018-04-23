<?php
/**
 * Created by PhpStorm.
 * User: MCANTOR
 * Date: 4/23/2018
 * Time: 4:07 PM
 */

namespace AppBundle\Model\Entity;


class Login
{
    protected $userName;
    protected $password;

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


}