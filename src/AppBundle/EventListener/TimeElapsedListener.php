<?php
/**
 * Created by PhpStorm.
 * User: MCANTOR
 * Date: 4/20/2018
 * Time: 4:41 PM
 */

namespace AppBundle\EventListener;


use Monolog\Logger;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class TimeElapsedListener
{
    /**
     * @var Logger
     */
    private $logger;

    /**
     * TimeElapsedListener constructor.
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {

        $this->logger = $logger;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $event->getRequest()->attributes->set('timeElapsed', microtime(true));
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        $request = $event->getRequest();
        /** @var Session $session */
        $session = $request->getSession();

        $timeStart = $event->getRequest()->get('timeElapsed');
        $timeFinish = microtime(true);

        $session->getFlashBag() ->add('success', 'El tiempo de ejecucion es de: '. ($timeFinish - $timeStart) . ' Milisegundos');

        $this->logger->info('Tiempo transcurrido: '. ($timeFinish - $timeStart));
    }
}