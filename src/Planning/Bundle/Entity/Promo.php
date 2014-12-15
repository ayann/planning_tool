<?php

namespace Planning\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promo
 *
 * @ORM\Table(name="promos")
 * @ORM\Entity(repositoryClass="Planning\Bundle\Entity\PromoRepository")
 */
class Promo
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
     * @ORM\Column(name="name", type="string", length=40, nullable=true)
     */
    private $name;
    
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
     * Set name
     *
     * @param string $name
     * @return Promo
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
     * @return Promo
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
     * @return Promo
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
     * @return Promo
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
}
