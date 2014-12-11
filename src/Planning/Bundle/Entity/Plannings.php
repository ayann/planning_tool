<?php

namespace Planning\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plannings
 *
 * @ORM\Table(name="plannings")
 * @ORM\Entity(repositoryClass="PlanningBundle\entity\PlanningsRepository")
 */
class Plannings
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
     * @ORM\Column(name="month", type="string", length=45, nullable=true)
     */
    private $month;

    /**
     * @var integer
     *
     * @ORM\Column(name="class_rooms_id", type="integer", nullable=false)
     */
    private $classRoomsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="promos_id", type="integer", nullable=false)
     */
    private $promosId;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=45, nullable=true)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;



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
     * Set startTime
     *
     * @param \DateTime $startTime
     * @return Plannings
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
     * @return Plannings
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
     * Set month
     *
     * @param string $month
     * @return Plannings
     */
    public function setMonth($month)
    {
        $this->month = $month;
    
        return $this;
    }

    /**
     * Get month
     *
     * @return string 
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set classRoomsId
     *
     * @param integer $classRoomsId
     * @return Plannings
     */
    public function setClassRoomsId($classRoomsId)
    {
        $this->classRoomsId = $classRoomsId;
    
        return $this;
    }

    /**
     * Get classRoomsId
     *
     * @return integer 
     */
    public function getClassRoomsId()
    {
        return $this->classRoomsId;
    }

    /**
     * Set promosId
     *
     * @param integer $promosId
     * @return Plannings
     */
    public function setPromosId($promosId)
    {
        $this->promosId = $promosId;
    
        return $this;
    }

    /**
     * Get promosId
     *
     * @return integer 
     */
    public function getPromosId()
    {
        return $this->promosId;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Plannings
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Plannings
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
}
