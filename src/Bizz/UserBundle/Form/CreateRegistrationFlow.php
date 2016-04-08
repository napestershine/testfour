<?php

namespace Bizz\UserBundle\Form;

use Craue\FormFlowBundle\Form\FormFlow;

class CreateRegistrationFlow extends FormFlow
{

    protected function loadStepsConfig()
    {
        return array(
            array(
                'label' => 'wheels',
                'form_type' => 'Bizz\UserBundle\Form\SelectUserType',
            ),
            array(
                'label' => 'wheels',
                'form_type' => 'Bizz\UserBundle\Form\SelectProcessType',
            ),
            array(
                'label' => 'engine',
                'form_type' => 'Bizz\UserBundle\Form\RegistrationType',
            ),
            array(
                'label' => 'confirmation',
            ),
        );
    }

}