<?php
// src/AppBundle/Entity/User.php

namespace Bizz\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="UserCat", inversedBy="user")
     * @ORM\JoinColumn(name="usercat_id", referencedColumnName="id")
     */
    private $usercat;
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="user")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;
    /**
     * @ORM\ManyToOne(targetEntity="Countries", inversedBy="user")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    private $country;
    /**
     * @ORM\ManyToOne(targetEntity="States", inversedBy="user")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     */
    private $state;

    /** @ORM\Column(name="linkedin_id", type="string", length=255, nullable=true) */
    protected $linkedin_id;

    /** @ORM\Column(name="linkedin_access_token", type="string", length=255, nullable=true) */
    protected $linkedin_access_token;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

}