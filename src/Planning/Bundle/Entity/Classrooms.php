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
     * @var integer
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
}
