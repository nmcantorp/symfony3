<?php
/**
 * Created by PhpStorm.
 * User: MCANTOR
 * Date: 4/30/2018
 * Time: 12:01 PM
 */

namespace AppBundle\Validator;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class AlnumWhiteSpaceValidator extends ConstraintValidator
{

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed      $value The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     */
    public function validate($value, Constraint $constraint)
    {
        if(!preg_match('/^[á-úÁ-Úa-zA-Z0-9\s]+$/', $value, $matches)){
            $this->context->buildViolation($constraint->message)
                ->setParameters('%string%', $value)
                ->addViolation();
        }
    }
}