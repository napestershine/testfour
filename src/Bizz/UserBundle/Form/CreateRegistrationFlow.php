<?php

namespace Bizz\UserBundle\Form;

use Craue\FormFlowBundle\Form\FormFlow;

class CreateRegistrationFlow extends FormFlow
{
    protected function loadStepsConfig()
    {
        return array(
            array(
                'label' => 'User Type',
                'form_type' => 'Bizz\UserBundle\Form\SelectUserType',
            ),
            array(
                'label' => 'Registration Type',
                'form_type' => 'Bizz\UserBundle\Form\SelectProcessType',
            ),
            array(
                'label' => 'Registration By Details',
                'form_type' => 'Bizz\UserBundle\Form\RegistrationType',
            ),
            array(
                'label' => 'Registration Confirmation',
            ),
        );
    }
}