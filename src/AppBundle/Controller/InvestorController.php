<?php

namespace AppBundle\Controller;

use AppBundle\Event\AirlineEvent;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InvestorController extends Controller implements TimeElapsedListenerController
{
    /**
     * @Route("/investor", name="investor")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $lan = $this->get('app.model_entity.airline');
        $lan->setCost(100);

        $airline = new AirlineEvent($lan);

        $this->container->get('event_dispatcher')->dispatch('investor.event', $airline);
        return $this->render('investor/changeCost.html.twig' ,
            [
                'title' => "Ejemplo uso de Eventos en Symfony"
            ]);
    }
}
