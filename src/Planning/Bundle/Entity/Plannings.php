<?php

namespace Planning\Bundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plannings
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Planning\Bundle\Entity\PlanningsRepository")
 */
class Plannings{
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
     * @ORM\Column(name="start", type="datetime")
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="datetime")
     */
    private $end;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
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
     * Set start
     *
     * @param \DateTime $start
     * @return Plannings
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return Plannings
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime 
     */
    public function getEnd()
    {
        return $this->end;
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

    /**
    * @Assert\Callback
    */
    public function validate(ExecutionContextInterface $context){
        $start_date =   $this->getStart();
        $end_date   =   $this->getEnd();
         
        if($start_date >= $end_date){
            $context->addViolationAt(
                'end',
                'Erreur! la date de fin est inférieure à la date de début',
                array(),
                null
            );
        }
    }
}
