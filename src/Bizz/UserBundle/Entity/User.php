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
     * @ORM\ManyToOne(targetEntity="Bizz\AdminBundle\Entity\UserCat", inversedBy="user")
     * @ORM\JoinColumn(name="usercat_id", referencedColumnName="id")
     */
    private $usercat;
    /**
     * @ORM\ManyToOne(targetEntity="Bizz\AdminBundle\Entity\Category", inversedBy="user")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;
    /**
     * @ORM\ManyToOne(targetEntity="Bizz\AdminBundle\Entity\Countries", inversedBy="user")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    private $country;
    /**
     * @ORM\ManyToOne(targetEntity="Bizz\AdminBundle\Entity\States", inversedBy="user")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     */
    private $state;

    /** @ORM\Column(name="linkedin_id", type="string", length=255, nullable=true) */
    protected $linkedin_id;

    /** @ORM\Column(name="linkedin_access_token", type="string", length=255, nullable=true) */
    protected $linkedin_access_token;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    protected $firstname;
    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    protected $lastname;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }
}