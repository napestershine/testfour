<?php

namespace Bizz\AdminBundle\Controller;

use Bizz\AdminBundle\Entity\Icat;
use Bizz\AdminBundle\Form\IcatType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Icat controller.
 *
 */
class IcatController extends Controller
{
    /**
     * Lists all Icat entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $icats = $em->getRepository('BizzAdminBundle:Icat')->findAll();

        return $this->render('icat/index.html.twig', array(
            'icats' => $icats,
        ));
    }

    /**
     * Creates a new Icat entity.
     *
     */
    public function newAction(Request $request)
    {
        $icat = new Icat();
        $form = $this->createForm('Bizz\AdminBundle\Form\IcatType', $icat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($icat);
            $em->flush();

            return $this->redirectToRoute('icat_show', array('id' => $icat->getId()));
        }

        return $this->render('icat/new.html.twig', array(
            'icat' => $icat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Icat entity.
     *
     */
    public function showAction(Icat $icat)
    {
        $deleteForm = $this->createDeleteForm($icat);

        return $this->render('icat/show.html.twig', array(
            'icat' => $icat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Icat entity.
     *
     */
    public function editAction(Request $request, Icat $icat)
    {
        $deleteForm = $this->createDeleteForm($icat);
        $editForm = $this->createForm('Bizz\AdminBundle\Form\IcatType', $icat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($icat);
            $em->flush();

            return $this->redirectToRoute('icat_edit', array('id' => $icat->getId()));
        }

        return $this->render('icat/edit.html.twig', array(
            'icat' => $icat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Icat entity.
     *
     */
    public function deleteAction(Request $request, Icat $icat)
    {
        $form = $this->createDeleteForm($icat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($icat);
            $em->flush();
        }

        return $this->redirectToRoute('icat_index');
    }

    /**
     * Creates a form to delete a Icat entity.
     *
     * @param Icat $icat The Icat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Icat $icat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('icat_delete', array('id' => $icat->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
