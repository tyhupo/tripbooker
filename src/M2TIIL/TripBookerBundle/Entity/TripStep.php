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
     * @ORM\Column(name="startDate", type="time")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="time")
     */
    private $endDate;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity="TripImage", mappedBy="tripStep", cascade={"remove","persist"}) 
     */
    protected $images;

    /**
     * @ORM\ManyToOne(targetEntity="Trip", inversedBy="steps", cascade={"remove"})
     * @ORM\JoinColumn(name="trip_step_id", referencedColumnName="id") 
     */
    protected $trip;


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
     * Add images
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripImage $images
     * @return TripStep
     */
    public function addImage(\M2TIIL\TripBookerBundle\Entity\TripImage $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripImage $images
     */
    public function removeImage(\M2TIIL\TripBookerBundle\Entity\TripImage $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set trip
     *
     * @param \M2TIIL\TripBookerBundle\Entity\Trip $trip
     * @return TripStep
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
}
