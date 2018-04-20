<?php
/**
 * Created by PhpStorm.
 * User: MCANTOR
 * Date: 4/20/2018
 * Time: 2:40 PM
 */

namespace AppBundle\Event;


use AppBundle\Model\Entity\Airline;
use Symfony\Component\EventDispatcher\Event;

class AirlineEvent extends Event
{
    /**
     * @var Airline
     */
    private $airline;

    /**
     * AirlineEvent constructor.
     * @param Airline $airline
     */
    public function __construct(Airline $airline)
    {
        $this->airline = $airline;
    }

    /**
     * @return Airline
     */
    public function getAirline()
    {
        return $this->airline;
    }


}