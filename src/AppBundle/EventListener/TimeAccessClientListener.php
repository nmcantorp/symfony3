<?php
/**
 * Created by PhpStorm.
 * User: MCANTOR
 * Date: 4/18/2018
 * Time: 2:42 PM
 */

namespace AppBundle\EventListener;
use AppBundle\Controller\ITimeAccessClientController;
use Monolog\Logger;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\Routing\Route;


/**
 * filtra el acceso al controntrolador si no se encuentra en el horario de atencion desde las 15 hrs hasta las 19 hrs
 * @package AppBundle\EventListener
 */
class TimeAccessClientListener
{
    /**
     * @var array
     */
    private $timeAccess;

    private $timeOpened;

    private $timeClosed;
    /**
     * @var Logger
     */
    private $logger;

    /**
     * TimeAccessClientListener constructor.
     * @param Logger $logger
     * @param array  $timeAccess
     */
    public function __construct( Logger $logger, Array $timeAccess)
    {
        $this->timeAccess = $timeAccess;
        $this->timeOpened = $timeAccess['timeOpened'];
        $this->timeClosed = $timeAccess['timeClosed'];
        $this->logger = $logger;
    }

    /**
     * @param FilterControllerEvent $event
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();
        $request = $event->getRequest();
        /** @var Session $session */
        $session = $request->getSession();

        if ($controller[0] instanceof ITimeAccessClientController)
        {
            $objDateTime = new \DateTime();
            $hour= (int)$objDateTime->format('H');

            if(($this->timeOpened <= $hour) && ($hour<$this->timeClosed ))
            {
                $message = "Bienvenido al horario de atencion a clientes,"
                            ."atenderemos desde las ". $this->timeOpened . " hrs. ";
                $message .= " hasta las ". $this->timeClosed ." hrs. gracias por su visita.";

                $session->getFlashBag()->add('success', $message);
            }else{
                $message = "Por favor visitenos desde las ". $this->timeOpened
                    ."hasta las ". $this->timeOpened . " hrs. gracias. ";

                $session->getFlashBag()->add('error', $message);
                $event->setController(function () use ($request) {
                    $route = new Route('/');
                    return new RedirectResponse($route->getPath());
                });
            }
        }
    }

    /**
     * @param FilterResponseEvent $event
     * @return bool
     */
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $this->logger->info('continuo ejecucion ');
        return true;
    }
}