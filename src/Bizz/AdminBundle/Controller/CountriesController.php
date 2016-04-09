<?php

namespace Bizz\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bizz\AdminBundle\Entity\Countries;
use Bizz\AdminBundle\Form\CountriesType;

/**
 * Countries controller.
 *
 */
class CountriesController extends Controller
{
    /**
     * Lists all Countries entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $countries = $em->getRepository('BizzAdminBundle:Countries')->findAll();

        return $this->render('countries/index.html.twig', array(
            'countries' => $countries,
        ));
    }

    /**
     * Creates a new Countries entity.
     *
     */
    public function newAction(Request $request)
    {
        $country = new Countries();
        $form = $this->createForm('Bizz\AdminBundle\Form\CountriesType', $country);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($country);
            $em->flush();

            return $this->redirectToRoute('countries_show', array('id' => $country->getId()));
        }

        return $this->render('countries/new.html.twig', array(
            'country' => $country,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Countries entity.
     *
     */
    public function showAction(Countries $country)
    {
        $deleteForm = $this->createDeleteForm($country);

        return $this->render('countries/show.html.twig', array(
            'country' => $country,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Countries entity.
     *
     */
    public function editAction(Request $request, Countries $country)
    {
        $deleteForm = $this->createDeleteForm($country);
        $editForm = $this->createForm('Bizz\AdminBundle\Form\CountriesType', $country);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($country);
            $em->flush();

            return $this->redirectToRoute('countries_edit', array('id' => $country->getId()));
        }

        return $this->render('countries/edit.html.twig', array(
            'country' => $country,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Countries entity.
     *
     */
    public function deleteAction(Request $request, Countries $country)
    {
        $form = $this->createDeleteForm($country);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($country);
            $em->flush();
        }

        return $this->redirectToRoute('countries_index');
    }

    /**
     * Creates a form to delete a Countries entity.
     *
     * @param Countries $country The Countries entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Countries $country)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('countries_delete', array('id' => $country->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
