<?php
/**
 * Created by PhpStorm.
 * User: MCANTOR
 * Date: 4/6/2018
 * Time: 5:04 PM
 */

namespace AppBundle\Model\Entity;

use Symfony\Component\Validator\Constraint as Assert;
use AppBundle\Validator\Constraints as MyValidator;
class User
{

    private $id;

    /**
     * @Assert\NotBlank()
     * @MyValidator\ContraintsAlnumWhiteSpace()
     */
    private $name;

    /**
     * @Assert\NotBlank()
     * @MyValidator\ContraintsAlnumWhiteSpace()
     */
    private $lastName;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @Assert\NotBlank()
     * @MyValidator\ContraintsAlnumWhiteSpace()
     * @Assert\Length(min=5, max=10)
     */
    private $userName;

    /**
     * @Assert\NotBlank()
     * @MyValidator\ContraintsAlnumWhiteSpace()
     * @Assert\Length(min=4, max=8)
     */
    private $password;

    /**
     * User constructor.
     * @param $id
     * @param $name
     * @param $lastName
     * @param $email
     */
    public function __construct($id, $name, $lastName, $email=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email;
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

    /**
     * @return null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param null $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

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