<?php

namespace M2TIIL\TripBookerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TripStepOrder
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TripStepOrder
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
     * @ORM\OneToOne(targetEntity="TripStep")
     * @ORM\JoinColumn(name="step_id", referencedColumnName="id")
     */
    private $step;

    /**
     * @ORM\ManyToMany(targetEntity="TripOption") 
     */
    protected $options;

    /**
     * @ORM\ManyToMany(targetEntity="Conveyance") 
     */
    protected $conveyances;

    /**
     * @ORM\ManyToMany(targetEntity="ConveyanceOption") 
     */
    private $conveyancesOptions;

    /**
     * @ORM\ManyToMany(targetEntity="Hotel") 
     */
    private $hotels;

    /**
     * @ORM\ManyToMany(targetEntity="GuidedTour") 
     */
    private $guidedTours;


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
     * Constructor
     */
    public function __construct()
    {
        $this->options = new \Doctrine\Common\Collections\ArrayCollection();
        $this->conveyances = new \Doctrine\Common\Collections\ArrayCollection();
        $this->conveyancesOptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->hotels = new \Doctrine\Common\Collections\ArrayCollection();
        $this->guidedTours = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add options
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripOption $options
     * @return TripStepOrder
     */
    public function addOption(\M2TIIL\TripBookerBundle\Entity\TripOption $options)
    {
        $this->options[] = $options;

        return $this;
    }

    /**
     * Remove options
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripOption $options
     */
    public function removeOption(\M2TIIL\TripBookerBundle\Entity\TripOption $options)
    {
        $this->options->removeElement($options);
    }

    /**
     * Get options
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Add conveyances
     *
     * @param \M2TIIL\TripBookerBundle\Entity\Conveyance $conveyances
     * @return TripStepOrder
     */
    public function addConveyance(\M2TIIL\TripBookerBundle\Entity\Conveyance $conveyances)
    {
        $this->conveyances[] = $conveyances;

        return $this;
    }

    /**
     * Remove conveyances
     *
     * @param \M2TIIL\TripBookerBundle\Entity\Conveyance $conveyances
     */
    public function removeConveyance(\M2TIIL\TripBookerBundle\Entity\Conveyance $conveyances)
    {
        $this->conveyances->removeElement($conveyances);
    }

    /**
     * Get conveyances
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConveyances()
    {
        return $this->conveyances;
    }

    /**
     * Add conveyancesOptions
     *
     * @param \M2TIIL\TripBookerBundle\Entity\ConveyanceOption $conveyancesOptions
     * @return TripStepOrder
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
     * Add hotels
     *
     * @param \M2TIIL\TripBookerBundle\Entity\Hotel $hotels
     * @return TripStepOrder
     */
    public function addHotel(\M2TIIL\TripBookerBundle\Entity\Hotel $hotels)
    {
        $this->hotels[] = $hotels;

        return $this;
    }

    /**
     * Remove hotels
     *
     * @param \M2TIIL\TripBookerBundle\Entity\Hotel $hotels
     */
    public function removeHotel(\M2TIIL\TripBookerBundle\Entity\Hotel $hotels)
    {
        $this->hotels->removeElement($hotels);
    }

    /**
     * Get hotels
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHotels()
    {
        return $this->hotels;
    }

    /**
     * Add guidedTours
     *
     * @param \M2TIIL\TripBookerBundle\Entity\GuidedTour $guidedTours
     * @return TripStepOrder
     */
    public function addGuidedTour(\M2TIIL\TripBookerBundle\Entity\GuidedTour $guidedTours)
    {
        $this->guidedTours[] = $guidedTours;

        return $this;
    }

    /**
     * Remove guidedTours
     *
     * @param \M2TIIL\TripBookerBundle\Entity\GuidedTour $guidedTours
     */
    public function removeGuidedTour(\M2TIIL\TripBookerBundle\Entity\GuidedTour $guidedTours)
    {
        $this->guidedTours->removeElement($guidedTours);
    }

    /**
     * Get guidedTours
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGuidedTours()
    {
        return $this->guidedTours;
    }

    /**
     * Set step
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripStep $step
     * @return TripStepOrder
     */
    public function setStep(\M2TIIL\TripBookerBundle\Entity\TripStep $step = null)
    {
        $this->step = $step;

        return $this;
    }

    /**
     * Get step
     *
     * @return \M2TIIL\TripBookerBundle\Entity\TripStep 
     */
    public function getStep()
    {
        return $this->step;
    }
}
