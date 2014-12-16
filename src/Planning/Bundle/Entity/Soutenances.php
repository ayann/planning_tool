<?php

namespace Planning\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Soutenances
 *
 * @ORM\Table(name="soutenances")
 * @ORM\Entity(repositoryClass="PlanningBundle\entity\SoutenancesRepository")
 */
class Soutenances
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
     * @var string
     *
     * @ORM\Column(name="group", type="string", length=45, nullable=true)
     */
    private $group;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_time", type="datetime", nullable=true)
     */
    private $startTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_time", type="datetime", nullable=true)
     */
    private $endTime;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="classrooms_id", type="integer", nullable=false)
     */
    private $classroomsId;


    /**
     * @var string
     *
     * @ORM\Column(name="isValid", type="integer", nullable=true)
     */
    private $isValid;
    
    function __construct() 
    {
        $this->isValid = 1;
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
     * Set group
     *
     * @param string $group
     * @return Soutenances
     */
    public function setGroup($group)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return string 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set startTime
     *
     * @param \DateTime $startTime
     * @return Soutenances
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    
        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime 
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     * @return Soutenances
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    
        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime 
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Soutenances
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set classroomsId
     *
     * @param integer $classroomsId
     * @return Soutenances
     */
    public function setClassroomsId($classroomsId)
    {
        $this->classroomsId = $classroomsId;
    
        return $this;
    }

    /**
     * Get classroomsId
     *
     * @return integer 
     */
    public function getClassroomsId()
    {
        return $this->classroomsId;
    }
}
