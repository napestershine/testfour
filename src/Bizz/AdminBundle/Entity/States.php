<?php

namespace Bizz\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * State
 *
 * @ORM\Table(name="states")
 * @ORM\Entity(repositoryClass="Bizz\AdminBundle\Repository\StatesRepository")
 */
class States
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255)
     */
    private $state;

    /**
     * @ORM\ManyToOne(targetEntity="Countries", inversedBy="state")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="state")
     */
    private $user;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return States
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }
}

