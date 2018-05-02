<?php
/**
 * Created by PhpStorm.
 * User: MCANTOR
 * Date: 4/30/2018
 * Time: 11:58 AM
 */

namespace AppBundle\Validator\Contraints;


use AppBundle\Validator\AlnumWhiteSpaceValidator;
use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContraintsAlnumWhiteSpace extends Constraint
{
    public $message = 'the string "%string%" contain an illegal text';

    public function validatedBy()
    {
        return AlnumWhiteSpaceValidator::class;
    }

}