<?php

namespace AppBundle\Controller;

use AppBundle\Form\LoginType;
use AppBundle\Model\Entity\Login;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LoginController extends Controller
{
    /**
     * @Route("/login_test", name="loginTest")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $login = new Login();

        $form = $this->createForm(LoginType::class, $login, [
            'attr'=>['class' => 'form-class form-horizontal', 'id' => 'login']
        ]);

        return $this->render('user/login.html.twig', [
            'form'=>$form->createView(),
        ]);
}
}
