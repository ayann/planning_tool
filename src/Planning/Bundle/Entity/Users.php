<?php

namespace Planning\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", indexes={@ORM\Index(name="fk_users_promos1_idx", columns={"promos_id"}), @ORM\Index(name="fk_users_soutenances1_idx", columns={"soutenances_id"})})
 * @ORM\Entity
 */
class Users
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
     * @ORM\Column(name="last_name", type="string", length=45, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=45, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phome", type="string", length=45, nullable=true)
     */
    private $phome;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=45, nullable=true)
     */
    private $address;

    /**
     * @var boolean
     *
     * @ORM\Column(name="personnal_computer", type="boolean", nullable=true)
     */
    private $personnalComputer = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="groups_id", type="integer", nullable=false)
     */
    private $groupsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="promos_id", type="integer", nullable=false)
     */
    private $promosId;

    /**
     * @var integer
     *
     * @ORM\Column(name="soutenances_id", type="integer", nullable=false)
     */
    private $soutenancesId;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=45, nullable=true)
     */
    private $role;



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
     * @return Users
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
     * @return Users
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
     * Set email
     *
     * @param string $email
     * @return Users
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
     * Set phome
     *
     * @param string $phome
     * @return Users
     */
    public function setPhome($phome)
    {
        $this->phome = $phome;
    
        return $this;
    }

    /**
     * Get phome
     *
     * @return string 
     */
    public function getPhome()
    {
        return $this->phome;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Users
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
     * Set personnalComputer
     *
     * @param boolean $personnalComputer
     * @return Users
     */
    public function setPersonnalComputer($personnalComputer)
    {
        $this->personnalComputer = $personnalComputer;
    
        return $this;
    }

    /**
     * Get personnalComputer
     *
     * @return boolean 
     */
    public function getPersonnalComputer()
    {
        return $this->personnalComputer;
    }

    /**
     * Set groupsId
     *
     * @param integer $groupsId
     * @return Users
     */
    public function setGroupsId($groupsId)
    {
        $this->groupsId = $groupsId;
    
        return $this;
    }

    /**
     * Get groupsId
     *
     * @return integer 
     */
    public function getGroupsId()
    {
        return $this->groupsId;
    }

    /**
     * Set promosId
     *
     * @param integer $promosId
     * @return Users
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
     * Set soutenancesId
     *
     * @param integer $soutenancesId
     * @return Users
     */
    public function setSoutenancesId($soutenancesId)
    {
        $this->soutenancesId = $soutenancesId;
    
        return $this;
    }

    /**
     * Get soutenancesId
     *
     * @return integer 
     */
    public function getSoutenancesId()
    {
        return $this->soutenancesId;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Users
     */
    public function setRole($role)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }
}
