<?php

namespace M2TIIL\TripBookerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TripStep
 *
 * @ORM\Table(name="trip_step")
 * @ORM\Entity(repositoryClass="M2TIIL\TripBookerBundle\Entity\TripStepRepository")
 */
class TripStep
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
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="startCity", type="string", length=255)
     */
    private $startCity;

    /**
     * @var string
     *
     * @ORM\Column(name="endCity", type="string", length=255)
     */
    private $endCity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime")
     */
    private $endDate;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var boolean
     *
     * @ORM\Column(name="startStep", type="boolean")
     */
    private $startStep;

    /**
     * @var boolean
     *
     * @ORM\Column(name="endStep", type="boolean", nullable=true)
     */
    private $endStep;

    /**
     * @ORM\OneToOne(targetEntity="TripImage", cascade={"merge", "remove", "persist"})
     * @ORM\JoinColumn(name="tripoptionimage_id", referencedColumnName="id")
     */
    protected $image;

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
     * @return TripStep
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
     * Set text
     *
     * @param string $text
     * @return TripStep
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set startCity
     *
     * @param string $startCity
     * @return TripStep
     */
    public function setStartCity($startCity)
    {
        $this->startCity = $startCity;

        return $this;
    }

    /**
     * Get startCity
     *
     * @return string 
     */
    public function getStartCity()
    {
        return $this->startCity;
    }

    /**
     * Set endCity
     *
     * @param string $endCity
     * @return TripStep
     */
    public function setEndCity($endCity)
    {
        $this->endCity = $endCity;

        return $this;
    }

    /**
     * Get endCity
     *
     * @return string 
     */
    public function getEndCity()
    {
        return $this->endCity;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return TripStep
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return TripStep
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return TripStep
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set image
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripImage $image
     * @return TripStep
     */
    public function setImage(\M2TIIL\TripBookerBundle\Entity\TripImage $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \M2TIIL\TripBookerBundle\Entity\TripImage 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add options
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripOption $options
     * @return TripStep
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
     * @return TripStep
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
     * @return TripStep
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
     * Set startStep
     *
     * @param boolean $startStep
     * @return TripStep
     */
    public function setStartStep($startStep)
    {
        $this->startStep = $startStep;

        return $this;
    }

    /**
     * Get startStep
     *
     * @return boolean 
     */
    public function getStartStep()
    {
        return $this->startStep;
    }

    /**
     * Set endStep
     *
     * @param boolean $endStep
     * @return TripStep
     */
    public function setEndStep($endStep)
    {
        $this->endStep = $endStep;

        return $this;
    }

    /**
     * Get endStep
     *
     * @return boolean 
     */
    public function getEndStep()
    {
        return $this->endStep;
    }
}
