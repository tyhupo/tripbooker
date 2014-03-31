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
     * @ORM\OneToOne(targetEntity="TripOptionImage", cascade={"merge", "remove", "persist"})
     * @ORM\JoinColumn(name="tripoptionimage_id", referencedColumnName="id")
     */
    protected $images;


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
    }

    /**
     * Set images
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripOptionImage $images
     * @return TripOption
     */
    public function setImages(\M2TIIL\TripBookerBundle\Entity\TripOptionImage $images = null)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Get images
     *
     * @return \M2TIIL\TripBookerBundle\Entity\TripOptionImage 
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Remove image
     */
    public function removeImage($image)
    {
        $key = array_search($image, $images);
        if ($key)
            unset($images[$key]);   
    }
}
