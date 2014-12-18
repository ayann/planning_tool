<?php 
    namespace User\Bundle\Entity;

    use FOS\UserBundle\Model\User as BaseUser;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="fos_user")
     */
    class User extends BaseUser
    {
        /**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        protected $id;

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
        private $personnalComputer = False;
    
       /**
        * @var string
        *
        * @ORM\Column(name="isValid", type="integer", nullable=true)
        */
        private $isValid;
    
        public function __construct()
        {
            parent::__construct();
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
     * Set lastName
     *
     * @param string $lastName
     * @return User
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
     * @return User
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
     * Set phome
     *
     * @param string $phome
     * @return User
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
     * @return User
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
     * @return User
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
     * Set isValid
     *
     * @param integer $isValid
     * @return User
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
}
