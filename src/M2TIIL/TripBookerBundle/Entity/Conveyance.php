<?php

namespace M2TIIL\TripBookerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conveyance
 *
 * @ORM\Table(name="conveyance")
 * @ORM\Entity(repositoryClass="M2TIIL\TripBookerBundle\Entity\ConveyanceRepository")
 */
class Conveyance
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="Trip", inversedBy="conveyances", cascade={"remove"})
     * @ORM\JoinColumn(name="conveyance_id", referencedColumnName="id") 
     */
    protected $trip;

    /**
     * @ORM\OneToMany(targetEntity="ConveyanceOption", mappedBy="conveyance", cascade={"remove","persist"}) 
     */
    protected $conveyancesOptions;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Conveyance
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
}
