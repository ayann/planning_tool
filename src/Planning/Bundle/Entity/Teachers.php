<?php

namespace Planning\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teachers
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Planning\Bundle\Entity\TeachersRepository")
 */
class Teachers
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
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\OneToMany(targetEntity="Plannings", mappedBy="course", cascade={"remove", "persist"})
     */
    private $plannings;


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
     * Set lastName
     *
     * @param string $lastName
     * @return Teachers
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Teachers
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->plannings = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add plannings
     *
     * @param \Planning\Bundle\Entity\Plannings $plannings
     * @return Teachers
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
        return $this->firstName." ".$this->lastName;
    }

}
