<?php

namespace M2TIIL\TripBookerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TripOptionImage
 *
 * @ORM\Table(name="trip_option_image")
 * @ORM\Entity(repositoryClass="M2TIIL\TripBookerBundle\Entity\TripOptionImageRepository")
 */
class TripOptionImage
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
     * @ORM\Column(name="uri", type="string", length=255)
     */
    private $uri;

    /**
     * @ORM\ManyToOne(targetEntity="TripOption", inversedBy="images", cascade={"remove"})
     * @ORM\JoinColumn(name="trip_option_image_id", referencedColumnName="id") 
     */
    protected $tripOption;


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
     * @return TripOptionImage
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
     * Set uri
     *
     * @param string $uri
     * @return TripOptionImage
     */
    public function setUri($uri)
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * Get uri
     *
     * @return string 
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Set tripOption
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripOption $tripOption
     * @return TripOptionImage
     */
    public function setTripOption(\M2TIIL\TripBookerBundle\Entity\TripOption $tripOption = null)
    {
        $this->tripOption = $tripOption;

        return $this;
    }

    /**
     * Get tripOption
     *
     * @return \M2TIIL\TripBookerBundle\Entity\TripOption 
     */
    public function getTripOption()
    {
        return $this->tripOption;
    }
}
