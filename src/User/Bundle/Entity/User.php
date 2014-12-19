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
         * @ORM\ManyToOne(targetEntity="Planning\Bundle\Entity\Promos", inversedBy="users", cascade={"persist"})
         * @ORM\JoinColumn(nullable=true)
         */
        private $promo;


        public function __construct()
        {
            parent::__construct();
            // your own logic
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
     * Set promo
     *
     * @param \Planning\Bundle\Entity\Promos $promo
     * @return User
     */
    public function setPromo(\Planning\Bundle\Entity\Promos $promo = null)
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
}
