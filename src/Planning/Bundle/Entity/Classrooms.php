<?php

namespace Planning\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classrooms
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Planning\Bundle\Entity\ClassroomsRepository")
 */
class Classrooms
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
     * @var integer
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacity", type="integer")
     */
    private $capacity;

    /**
     * Set number
     *
     * @ORM\Column(name="number_of_computer", type="integer")
     */
    private $numberOfComputer;

    /**
     * @ORM\ManyToOne(targetEntity="Establishments", inversedBy="classrooms", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $establishment;

    /**
     * @ORM\OneToMany(targetEntity="Plannings", mappedBy="classroom", cascade={"remove", "persist"})
     */
    private $plannings;


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
     * @param integer $number
     * @return Classrooms
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     * @return Classrooms
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
     * Set numberOfComputer
     *
     * @param integer $numberOfComputer
     * @return Classrooms
     */
    public function setNumberOfComputer($numberOfComputer)
    {
        $this->numberOfComputer = $numberOfComputer;

        return $this;
    }

    /**
     * Get numberOfComputer
     *
     * @return integer 
     */
    public function getNumberOfComputer()
    {
        return $this->numberOfComputer;
    }

    /**
     * Set establishment
     *
     * @param \Planning\Bundle\Entity\Establishments $establishment
     * @return Classrooms
     */
    public function setEstablishment(\Planning\Bundle\Entity\Establishments $establishment)
    {
        $this->establishment = $establishment;

        return $this;
    }

    /**
     * Get establishment
     *
     * @return \Planning\Bundle\Entity\Establishments 
     */
    public function getEstablishment()
    {
        return $this->establishment;
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
     * @return Classrooms
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
        return "Salle N° $this->number | $this->establishment";
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
     * Set numberOfComputer
     *
     * @param integer $numberOfComputer
     * @return Classrooms
     */
    public function setNumberOfComputer($numberOfComputer)
    {
        $this->numberOfComputer = $numberOfComputer;

        return $this;
    }

    /**
     * Get numberOfComputer
     *
     * @return integer 
     */
    public function getNumberOfComputer()
    {
        return $this->numberOfComputer;
    }

    /**
     * Set establishment
     *
     * @param \Planning\Bundle\Entity\Establishments $establishment
     * @return Classrooms
     */
    public function setEstablishment(\Planning\Bundle\Entity\Establishments $establishment)
    {
        $this->establishment = $establishment;

        return $this;
    }

    /**
     * Get establishment
     *
     * @return \Planning\Bundle\Entity\Establishments 
     */
    public function getEstablishment()
    {
        return $this->establishment;
    }
}
