<?php

namespace Bizz\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BizzAdminBundle:Default:index.html.twig');
    }
}
