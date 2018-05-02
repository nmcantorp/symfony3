<?php

namespace AppBundle\Controller;

use AppBundle\Form\RegisterType;
use AppBundle\Model\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
    /**
     * @Route("/register_user", name="register_user")
     * @param Request $request
     *
     */
    public function CreateAction(Request $request)
    {
        $form = $this->formRegister($request);
        return $this->render(':user:register_user.html.twig',[
            'form'=>$form->createView(),
        ]);
    }

    private function formRegister(Request $request)
    {
        $user = new User(1,'prueba1', 'apellido1', 'prueba1@apellido1.com');
        return $this->createForm(RegisterType::class,$user);
    }
}
