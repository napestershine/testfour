<?php

namespace Bizz\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BizzUserBundle:Default:index.html.twig');
    }
}
