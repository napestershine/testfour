<?php

namespace Bizz\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bizz\AdminBundle\Entity\States;
use Bizz\AdminBundle\Form\StatesType;

/**
 * States controller.
 *
 */
class StatesController extends Controller
{
    /**
     * Lists all States entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $states = $em->getRepository('BizzAdminBundle:States')->findAll();

        return $this->render('states/index.html.twig', array(
            'states' => $states,
        ));
    }

    /**
     * Creates a new States entity.
     *
     */
    public function newAction(Request $request)
    {
        $state = new States();
        $form = $this->createForm('Bizz\AdminBundle\Form\StatesType', $state);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($state);
            $em->flush();

            return $this->redirectToRoute('states_show', array('id' => $state->getId()));
        }

        return $this->render('states/new.html.twig', array(
            'state' => $state,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a States entity.
     *
     */
    public function showAction(States $state)
    {
        $deleteForm = $this->createDeleteForm($state);

        return $this->render('states/show.html.twig', array(
            'state' => $state,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing States entity.
     *
     */
    public function editAction(Request $request, States $state)
    {
        $deleteForm = $this->createDeleteForm($state);
        $editForm = $this->createForm('Bizz\AdminBundle\Form\StatesType', $state);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($state);
            $em->flush();

            return $this->redirectToRoute('states_edit', array('id' => $state->getId()));
        }

        return $this->render('states/edit.html.twig', array(
            'state' => $state,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a States entity.
     *
     */
    public function deleteAction(Request $request, States $state)
    {
        $form = $this->createDeleteForm($state);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($state);
            $em->flush();
        }

        return $this->redirectToRoute('states_index');
    }

    /**
     * Creates a form to delete a States entity.
     *
     * @param States $state The States entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(States $state)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('states_delete', array('id' => $state->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
