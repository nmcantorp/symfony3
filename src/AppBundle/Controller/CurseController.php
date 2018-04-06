<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CurseController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    /**
     * @Route("/curse_list" , name="listCurse")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        $names = [ 'Symfony 3', 'Laravel 5', 'Zend Framework 3', 'CodeIgniter 3'];

        return $this->render(':curse:list.html.twig' ,
            [
                'names' => $names,
                'currentDate' => new \DateTime(),
            ]
        );
    }
}
