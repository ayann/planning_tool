<?php

namespace Planning\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classrooms
 *
 * @ORM\Table(name="classrooms")
 * @ORM\Entity(repositoryClass="PlanningBundle\entity\ClassroomsRepository")
 */
class Classrooms
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="number_of_computer", type="integer", nullable=true)
     */
    private $numberOfComputer;

    /**
     * @var string
     *
     * @ORM\Column(name="number_of_class", type="string", length=45, nullable=true)
     */
    private $numberOfClass;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacity_of_class", type="integer", nullable=true)
     */
    private $capacityOfClass;

    /**
     * @var integer
     *
     * @ORM\Column(name="establishments_id", type="integer", nullable=false)
     */
    private $establishmentsId;



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
     * Set numberOfClass
     *
     * @param string $numberOfClass
     * @return Classrooms
     */
    public function setNumberOfClass($numberOfClass)
    {
        $this->numberOfClass = $numberOfClass;
    
        return $this;
    }

    /**
     * Get numberOfClass
     *
     * @return string 
     */
    public function getNumberOfClass()
    {
        return $this->numberOfClass;
    }

    /**
     * Set capacityOfClass
     *
     * @param integer $capacityOfClass
     * @return Classrooms
     */
    public function setCapacityOfClass($capacityOfClass)
    {
        $this->capacityOfClass = $capacityOfClass;
    
        return $this;
    }

    /**
     * Get capacityOfClass
     *
     * @return integer 
     */
    public function getCapacityOfClass()
    {
        return $this->capacityOfClass;
    }

    /**
     * Set establishmentsId
     *
     * @param integer $establishmentsId
     * @return Classrooms
     */
    public function setEstablishmentsId($establishmentsId)
    {
        $this->establishmentsId = $establishmentsId;
    
        return $this;
    }

    /**
     * Get establishmentsId
     *
     * @return integer 
     */
    public function getEstablishmentsId()
    {
        return $this->establishmentsId;
    }
}
