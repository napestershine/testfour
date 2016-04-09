<?php

namespace Bizz\AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bizz\AdminBundle\Entity\UserCat;

/**
 * UserCat controller.
 *
 */
class UserCatController extends Controller
{
    /**
     * Lists all UserCat entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $userCats = $em->getRepository('BizzAdminBundle:UserCat')->findAll();

        return $this->render('usercat/index.html.twig', array(
            'userCats' => $userCats,
        ));
    }

    /**
     * Finds and displays a UserCat entity.
     *
     */
    public function showAction(UserCat $userCat)
    {

        return $this->render('usercat/show.html.twig', array(
            'userCat' => $userCat,
        ));
    }
}
