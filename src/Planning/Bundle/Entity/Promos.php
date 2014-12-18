<?php

namespace Planning\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promos
 *
 * @ORM\Table(name="promos")
 * @ORM\Entity(repositoryClass="Planning\Bundle\Entity\PromosRepository")
 */
class Promos
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
     * @ORM\Column(name="number", type="integer", nullable=true)
     */
    private $number;
	
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=40, nullable=true)
     */
    private $title;
    
    /**
     * @var string
     *
     * @ORM\Column(name="memo", type="string", length=40, nullable=true)
     */
    private $memo;
	
    /**
     * @var string
     *
     * @ORM\Column(name="date_start", type="datetime", nullable=true)
     */
    private $dateStart;
	
    /**
     * @var string
     *
     * @ORM\Column(name="date_end", type="datetime", nullable=true)
     */
    private $dateEnd;
	
   /**
    * @var \User
    *
    * @ORM\ManyToOne(targetEntity="User\Bundle\Entity\User")
    * 
    */
    protected $user;
    
    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=140, nullable=true)
     */
    private $comment;

    /**
     * @var integer
     *
     * @ORM\Column(name="isValid", type="integer", nullable=true)
     */
    private $isValid;

    /**
    * @ORM\OneToMany(targetEntity="Plannings", mappedBy="promo", cascade={"remove", "persist"})
    */
    private $plannings;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->plannings = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Promos
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Promos
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set isValid
     *
     * @param integer $isValid
     * @return Promos
     */
    public function setIsValid($isValid)
    {
        $this->isValid = $isValid;
    
        return $this;
    }

    /**
     * Get isValid
     *
     * @return integer 
     */
    public function getIsValid()
    {
        return $this->isValid;
    }

    /**
     * Set user
     *
     * @param \User\Bundle\Entity\User $user
     * @return Promos
     */
    public function setUser(\User\Bundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \User\Bundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
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
}
