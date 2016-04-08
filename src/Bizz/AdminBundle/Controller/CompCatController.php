<?php

namespace Bizz\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bizz\AdminBundle\Entity\CompCat;
use Bizz\AdminBundle\Form\CompCatType;

/**
 * CompCat controller.
 *
 */
class CompCatController extends Controller
{
    /**
     * Lists all CompCat entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $compCats = $em->getRepository('BizzAdminBundle:CompCat')->findAll();

        return $this->render('compcat/index.html.twig', array(
            'compCats' => $compCats,
        ));
    }

    /**
     * Creates a new CompCat entity.
     *
     */
    public function newAction(Request $request)
    {
        $compCat = new CompCat();
        $form = $this->createForm('Bizz\AdminBundle\Form\CompCatType', $compCat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($compCat);
            $em->flush();

            return $this->redirectToRoute('compcat_show', array('id' => $compCat->getId()));
        }

        return $this->render('compcat/new.html.twig', array(
            'compCat' => $compCat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CompCat entity.
     *
     */
    public function showAction(CompCat $compCat)
    {
        $deleteForm = $this->createDeleteForm($compCat);

        return $this->render('compcat/show.html.twig', array(
            'compCat' => $compCat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CompCat entity.
     *
     */
    public function editAction(Request $request, CompCat $compCat)
    {
        $deleteForm = $this->createDeleteForm($compCat);
        $editForm = $this->createForm('Bizz\AdminBundle\Form\CompCatType', $compCat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($compCat);
            $em->flush();

            return $this->redirectToRoute('compcat_edit', array('id' => $compCat->getId()));
        }

        return $this->render('compcat/edit.html.twig', array(
            'compCat' => $compCat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a CompCat entity.
     *
     */
    public function deleteAction(Request $request, CompCat $compCat)
    {
        $form = $this->createDeleteForm($compCat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($compCat);
            $em->flush();
        }

        return $this->redirectToRoute('compcat_index');
    }

    /**
     * Creates a form to delete a CompCat entity.
     *
     * @param CompCat $compCat The CompCat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CompCat $compCat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('compcat_delete', array('id' => $compCat->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
