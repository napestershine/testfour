<?php

namespace Bizz\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BizzUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
