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
    private $trip;

    /**
     * @ORM\OneToMany(targetEntity="ConveyanceOption", mappedBy="conveyance", cascade={"remove","persist"}) 
     */
    private $conveyancesOptions;

    /**
     * To string
     */
    public function __toString() {
        return $this->title;
    }


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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->conveyancesOptions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set trip
     *
     * @param \M2TIIL\TripBookerBundle\Entity\Trip $trip
     * @return Conveyance
     */
    public function setTrip(\M2TIIL\TripBookerBundle\Entity\Trip $trip = null)
    {
        $this->trip = $trip;

        return $this;
    }

    /**
     * Get trip
     *
     * @return \M2TIIL\TripBookerBundle\Entity\Trip 
     */
    public function getTrip()
    {
        return $this->trip;
    }

    /**
     * Add conveyancesOptions
     *
     * @param \M2TIIL\TripBookerBundle\Entity\ConveyanceOption $conveyancesOptions
     * @return Conveyance
     */
    public function addConveyancesOption(\M2TIIL\TripBookerBundle\Entity\ConveyanceOption $conveyancesOptions)
    {
        $this->conveyancesOptions[] = $conveyancesOptions;

        return $this;
    }

    /**
     * Remove conveyancesOptions
     *
     * @param \M2TIIL\TripBookerBundle\Entity\ConveyanceOption $conveyancesOptions
     */
    public function removeConveyancesOption(\M2TIIL\TripBookerBundle\Entity\ConveyanceOption $conveyancesOptions)
    {
        $this->conveyancesOptions->removeElement($conveyancesOptions);
    }

    /**
     * Get conveyancesOptions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConveyancesOptions()
    {
        return $this->conveyancesOptions;
    }

    /**
     * Set conveyancesOptions
     */
    public function setConveyancesOptions($options)
    {
        $this->conveyancesOptions = $options;
    }
}
