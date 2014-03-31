<?php

namespace M2TIIL\TripBookerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trip
 *
 * @ORM\Table(name="trip")
 * @ORM\Entity(repositoryClass="M2TIIL\TripBookerBundle\Entity\TripRepository")
 */
class Trip
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
     * @ORM\ManyToMany(targetEntity="TripCategory") 
     */
    protected $categories;

    /**
     * @ORM\ManyToMany(targetEntity="Conveyance") 
     */
    protected $conveyances;

    /**
     * @ORM\ManyToMany(targetEntity="ConveyanceOption") 
     */
    private $conveyancesOptions;

    /**
     * @ORM\ManyToMany(targetEntity="TripOption") 
     */
    protected $options;

    /**
     * @ORM\OneToOne(targetEntity="TripImage", cascade={"merge", "remove", "persist"})
     * @ORM\JoinColumn(name="tripoptionimage_id", referencedColumnName="id")
     */
    protected $image;

    /**
     * @ORM\ManyToMany(targetEntity="TripStep") 
     */
    protected $steps;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->conveyances = new \Doctrine\Common\Collections\ArrayCollection();
        $this->options = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Trip
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
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Trip
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
     * @return Trip
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
     * Set text
     *
     * @param string $text
     * @return Trip
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
     * @return Trip
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
     * Add categories
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripCategory $categories
     * @return Trip
     */
    public function addCategory(\M2TIIL\TripBookerBundle\Entity\TripCategory $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripCategory $categories
     */
    public function removeCategory(\M2TIIL\TripBookerBundle\Entity\TripCategory $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add conveyances
     *
     * @param \M2TIIL\TripBookerBundle\Entity\Conveyance $conveyances
     * @return Trip
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
     * Add options
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripOption $options
     * @return Trip
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
     * Add steps
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripStep $steps
     * @return Trip
     */
    public function addStep(\M2TIIL\TripBookerBundle\Entity\TripStep $steps)
    {
        $this->steps[] = $steps;

        return $this;
    }

    /**
     * Remove steps
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripStep $steps
     */
    public function removeStep(\M2TIIL\TripBookerBundle\Entity\TripStep $steps)
    {
        $this->steps->removeElement($steps);
    }

    /**
     * Get steps
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSteps()
    {
        return $this->steps;
    }

    /**
     * Add conveyancesOptions
     *
     * @param \M2TIIL\TripBookerBundle\Entity\ConveyanceOption $conveyancesOptions
     * @return Trip
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
     * Set images
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripImage $images
     * @return Trip
     */
    public function setImages(\M2TIIL\TripBookerBundle\Entity\TripImage $images = null)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Get images
     *
     * @return \M2TIIL\TripBookerBundle\Entity\TripImage 
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set image
     *
     * @param \M2TIIL\TripBookerBundle\Entity\TripImage $image
     * @return Trip
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
}
