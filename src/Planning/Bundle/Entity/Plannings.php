<?php

namespace Planning\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plannings
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Planning\Bundle\Entity\PlanningsRepository")
 */
class Plannings
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
     * @ORM\ManyToOne(targetEntity="Classrooms", inversedBy="plannings", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $classroom;

    /**
     * @ORM\ManyToOne(targetEntity="Promos", inversedBy="plannings", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $promo;

    /**
     * @ORM\ManyToOne(targetEntity="Courses", inversedBy="plannings", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $course;

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

    /**
     * Set classroom
     *
     * @param \Planning\Bundle\Entity\Classrooms $classroom
     * @return Plannings
     */
    public function setClassroom(\Planning\Bundle\Entity\Classrooms $classroom)
    {
        $this->classroom = $classroom;

        return $this;
    }

    /**
     * Get classroom
     *
     * @return \Planning\Bundle\Entity\Classrooms 
     */
    public function getClassroom()
    {
        return $this->classroom;
    }

    /**
     * Set promo
     *
     * @param \Planning\Bundle\Entity\Promos $promo
     * @return Plannings
     */
    public function setPromo(\Planning\Bundle\Entity\Promos $promo)
    {
        $this->promo = $promo;

        return $this;
    }

    /**
     * Get promo
     *
     * @return \Planning\Bundle\Entity\Promos 
     */
    public function getPromo()
    {
        return $this->promo;
    }

    /**
     * Set course
     *
     * @param \Planning\Bundle\Entity\Courses $course
     * @return Plannings
     */
    public function setCourse(\Planning\Bundle\Entity\Courses $course)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \Planning\Bundle\Entity\Courses 
     */
    public function getCourse()
    {
        return $this->course;
    }
}
