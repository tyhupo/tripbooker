<?php

namespace M2TIIL\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id;
	
	/**
	 * @var \M2TIIL\TripBookerBundle\Entity\BookerOrder
     * @ORM\ManyToMany(targetEntity="\M2TIIL\TripBookerBundle\Entity\BookerOrder") 
     */
    private $bookerOrder;
	

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
        parent::__construct();
        $this->bookerOrder = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add bookerOrder
     *
     * @param \M2TIIL\TripBookerBundle\Entity\BookerOrder $bookerOrder
     * @return User
     */
    public function addBookerOrder(\M2TIIL\TripBookerBundle\Entity\BookerOrder $bookerOrder)
    {
        $this->bookerOrder[] = $bookerOrder;

        return $this;
    }

    /**
     * Remove bookerOrder
     *
     * @param \M2TIIL\TripBookerBundle\Entity\BookerOrder $bookerOrder
     */
    public function removeBookerOrder(\M2TIIL\TripBookerBundle\Entity\BookerOrder $bookerOrder)
    {
        $this->bookerOrder->removeElement($bookerOrder);
    }

    /**
     * Get bookerOrder
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBookerOrder()
    {
        return $this->bookerOrder;
    }
}
