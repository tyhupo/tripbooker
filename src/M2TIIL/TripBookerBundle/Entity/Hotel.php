<?php

namespace M2TIIL\TripBookerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hotel
 *
 * @ORM\Table(name="hotel")
 * @ORM\Entity(repositoryClass="M2TIIL\TripBookerBundle\Entity\HotelRepository")
 */
class Hotel
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
     * @var integer
     *
     * @ORM\Column(name="stars", type="integer")
     */
    private $stars;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacity", type="integer")
     */
    private $capacity;
	
	/**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @ORM\OneToOne(targetEntity="TripImage", cascade={"merge", "remove", "persist"})
     * @ORM\JoinColumn(name="tripoptionimage_id", referencedColumnName="id")
     */
    protected $image;

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
     * Set stars
     *
     * @param integer $stars
     * @return Hotel
     */
    public function setStars($stars)
    {
        $this->stars = $stars;

        return $this;
    }

    /**
     * Get stars
     *
     * @return integer 
     */
    public function getStars()
    {
        return $this->stars;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     * @return Hotel
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return integer 
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Hotel
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Hotel
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
     * Set image
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripImage $image
     * @return Hotel
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
     * Set text
     *
     * @param string $text
     * @return Hotel
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
}
