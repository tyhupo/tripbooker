<?php

namespace M2TIIL\TripBookerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TripOption
 *
 * @ORM\Table(name="trip_option")
 * @ORM\Entity(repositoryClass="M2TIIL\TripBookerBundle\Entity\TripOptionRepository")
 */
class TripOption
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
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="Trip", inversedBy="options", cascade={"remove"})
     * @ORM\JoinColumn(name="trip_option_id", referencedColumnName="id") 
     */
    protected $trip;

    /**
     * @ORM\OneToMany(targetEntity="TripOptionImage", mappedBy="tripOption", cascade={"remove","persist"}) 
     */
    protected $images;


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
     * @return TripOption
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
     * @return TripOption
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
     * Set price
     *
     * @param float $price
     * @return TripOption
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
     * Set trip
     *
     * @param \M2TIIL\TripBookerBundle\Entity\Trip $trip
     * @return TripOption
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
     * Add images
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripOptionImage $images
     * @return TripOption
     */
    public function addImage(\M2TIIL\TripBookerBundle\Entity\TripOptionImage $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripOptionImage $images
     */
    public function removeImage(\M2TIIL\TripBookerBundle\Entity\TripOptionImage $images)
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
}
