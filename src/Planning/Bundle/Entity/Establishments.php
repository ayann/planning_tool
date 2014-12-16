<?php

namespace Planning\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Establishments
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Establishments
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
     * @ORM\Column(name="address", type="string", length=60)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=20)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="subwayLine", type="string", length=20)
     */
    private $subwayLine;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=60)
     */
    private $name;

    /**
    * @ORM\OneToMany(targetEntity="Classrooms", mappedBy="establishment", cascade={"remove", "persist"})
    */
    private $classrooms;

    /**
     * @var string
     *
     * @ORM\Column(name="isValid", type="integer", nullable=true)
     */
    private $isValid;
    
    function __construct() 
    {
        $this->classrooms = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set address
     *
     * @param string $address
     * @return Establishments
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Establishments
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Establishments
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set subwayLine
     *
     * @param string $subwayLine
     * @return Establishments
     */
    public function setSubwayLine($subwayLine)
    {
        $this->subwayLine = $subwayLine;

        return $this;
    }

    /**
     * Get subwayLine
     *
     * @return string 
     */
    public function getSubwayLine()
    {
        return $this->subwayLine;
    }

    public function __toString()
    {
        return $this->name." | ".$this->address;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Establishments
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
     * Add classrooms
     *
     * @param \Planning\Bundle\Entity\Classrooms $classrooms
     * @return Establishments
     */
    public function addClassroom(\Planning\Bundle\Entity\Classrooms $classrooms)
    {
        $this->classrooms[] = $classrooms;

        return $this;
    }

    /**
     * Remove classrooms
     *
     * @param \Planning\Bundle\Entity\Classrooms $classrooms
     */
    public function removeClassroom(\Planning\Bundle\Entity\Classrooms $classrooms)
    {
        $this->classrooms->removeElement($classrooms);
    }

    /**
     * Get classrooms
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClassrooms()
    {
        return $this->classrooms;
    }
}
