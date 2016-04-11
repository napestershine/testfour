<?php

namespace Bizz\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BizzWebBundle:Default:index.html.twig');
    }
}
