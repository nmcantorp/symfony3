<?php

namespace AppBundle\Controller;

use AppBundle\Model\Entity\User;
use ArrayObject;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    private $userList;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->userList = new ArrayObject();
        $this->userList->append(new User(1, "Andres", "Guzman"));
        $this->userList->append(new User(2, "Linus", "Torvalds"));
        $this->userList->append(new User(3, "Steve", "Jobs"));
        $this->userList->append(new User(4, "Rasmus", "Lerdorf"));
    }

    /**
     * @Route("/user_list", name="userList")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->redirectToRoute("userListPrincipal");
    }

    /**
     * @Route("/user/list", name="userListPrincipal")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        return $this->render(':user:list.html.twig',
            [
                'userList' => $this->userList,
                'title' => 'Listado de usuarios',
                'currentDate'=>new \DateTime()
            ]
        );
    }
}
