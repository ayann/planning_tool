<?php

namespace Planning\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Planning\Bundle\Entity\PromosRepository")
 */
class Promos{
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
     * @ORM\Column(name="number", type="string", length=9, nullable=true)
     */
    private $number;

    /**
    * @ORM\OneToMany(targetEntity="Plannings", mappedBy="promo", cascade={"remove", "persist"})
    */
    private $plannings;

    /**
    * @ORM\OneToMany(targetEntity="User\Bundle\Entity\User", mappedBy="promo", cascade={"remove", "persist"})
    */
    private $users;


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
     * Set number
     *
     * @param string $number
     * @return Promos
     */
    public function setNumber($number)
    {
        $this->number = $number;
    
        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->plannings = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add plannings
     *
     * @param \Planning\Bundle\Entity\Plannings $plannings
     * @return Promos
     */
    public function addPlanning(\Planning\Bundle\Entity\Plannings $plannings)
    {
        $this->plannings[] = $plannings;

        return $this;
    }

    /**
     * Remove plannings
     *
     * @param \Planning\Bundle\Entity\Plannings $plannings
     */
    public function removePlanning(\Planning\Bundle\Entity\Plannings $plannings)
    {
        $this->plannings->removeElement($plannings);
    }

    /**
     * Get plannings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlannings()
    {
        return $this->plannings;
    }

    public function __toString()
    {
        return $this->number;
    }

    /**
     * Add users
     *
     * @param \User\Bundle\Entity\User $users
     * @return Promos
     */
    public function addUser(\User\Bundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \User\Bundle\Entity\User $users
     */
    public function removeUser(\User\Bundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
