<?php
/**
 * Created by PhpStorm.
 * User: MCANTOR
 * Date: 4/20/2018
 * Time: 2:51 PM
 */

namespace AppBundle\EventListener;


use AppBundle\Event\AirlineEvent;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;

class InvestorListener
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    private $name = "Andres";

    /**
     * InvestorListener constructor.
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function onUpCost(AirlineEvent $event){
        $investor = $event->getAirline();
        $message = "Inversionista: ". $this->getName(). " notificado: ". $investor;

        $request = $this->requestStack->getCurrentRequest();
        /** @var Session $session */
        $session = $request->getSession();
        $session->getFlashBag()->add('success', $message);
    }
}