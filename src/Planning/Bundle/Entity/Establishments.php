<?php

namespace Planning\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Establishments
 *
 * @ORM\Table(name="establishments")
 * @ORM\Entity(repositoryClass="PlanningBundle\entity\EstablishmentsRepository")
 */
class Establishments
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
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=20, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="subway_line", type="string", length=45, nullable=true)
     */
    private $subwayLine;

    /**
     * @var string
     *
     * @ORM\Column(name="access_plan", type="string", length=255, nullable=true)
     */
    private $accessPlan;



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

    /**
     * Set accessPlan
     *
     * @param string $accessPlan
     * @return Establishments
     */
    public function setAccessPlan($accessPlan)
    {
        $this->accessPlan = $accessPlan;
    
        return $this;
    }

    /**
     * Get accessPlan
     *
     * @return string 
     */
    public function getAccessPlan()
    {
        return $this->accessPlan;
    }
}
