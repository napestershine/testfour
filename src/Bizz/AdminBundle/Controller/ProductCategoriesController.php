<?php

namespace Bizz\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bizz\AdminBundle\Entity\ProductCategories;
use Bizz\AdminBundle\Form\ProductCategoriesType;

/**
 * ProductCategories controller.
 *
 */
class ProductCategoriesController extends Controller
{
    /**
     * Lists all ProductCategories entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productCategories = $em->getRepository('BizzAdminBundle:ProductCategories')->findAll();

        return $this->render('productcategories/index.html.twig', array(
            'productCategories' => $productCategories,
        ));
    }

    /**
     * Creates a new ProductCategories entity.
     *
     */
    public function newAction(Request $request)
    {
        $productCategory = new ProductCategories();
        $form = $this->createForm('Bizz\AdminBundle\Form\ProductCategoriesType', $productCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productCategory);
            $em->flush();

            return $this->redirectToRoute('productcategories_show', array('id' => $productCategory->getId()));
        }

        return $this->render('productcategories/new.html.twig', array(
            'productCategory' => $productCategory,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProductCategories entity.
     *
     */
    public function showAction(ProductCategories $productCategory)
    {
        $deleteForm = $this->createDeleteForm($productCategory);

        return $this->render('productcategories/show.html.twig', array(
            'productCategory' => $productCategory,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ProductCategories entity.
     *
     */
    public function editAction(Request $request, ProductCategories $productCategory)
    {
        $deleteForm = $this->createDeleteForm($productCategory);
        $editForm = $this->createForm('Bizz\AdminBundle\Form\ProductCategoriesType', $productCategory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productCategory);
            $em->flush();

            return $this->redirectToRoute('productcategories_edit', array('id' => $productCategory->getId()));
        }

        return $this->render('productcategories/edit.html.twig', array(
            'productCategory' => $productCategory,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProductCategories entity.
     *
     */
    public function deleteAction(Request $request, ProductCategories $productCategory)
    {
        $form = $this->createDeleteForm($productCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($productCategory);
            $em->flush();
        }

        return $this->redirectToRoute('productcategories_index');
    }

    /**
     * Creates a form to delete a ProductCategories entity.
     *
     * @param ProductCategories $productCategory The ProductCategories entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProductCategories $productCategory)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('productcategories_delete', array('id' => $productCategory->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
