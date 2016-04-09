<?php

namespace Bizz\UserBundle\Controller;

use Bizz\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function registerUserAction()
    {
        $formData = new User(); // Your form data class. Has to be an object, won't work properly with an array.

        $flow = $this->get('bizz.form.flow.registration'); // must match the flow's service id
        $flow->bind($formData);

        // form of the current step
        $form = $flow->createForm();
        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData($form);

            if ($flow->nextStep()) {
                // form for the next step
                $form = $flow->createForm();
            } else {
                // flow finished
                $em = $this->getDoctrine()->getManager();
                $em->persist($formData);
                $em->flush();

                $flow->reset(); // remove step data from the session

                return $this->redirect($this->generateUrl('fos_user_profile_show')); // redirect when done
            }
        }

        return $this->render('BizzUserBundle:User:registerUser.html.twig', array(
            'form' => $form->createView(),
            'flow' => $flow,
        ));
    }
}
