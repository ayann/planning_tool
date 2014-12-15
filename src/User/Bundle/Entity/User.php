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
        * @var \Promo
        *
        * @ORM\ManyToOne(targetEntity="Planning\Bundle\Entity\Promo")
        * @ORM\JoinColumns({
        *   @ORM\JoinColumn(name="promo_id", referencedColumnName="id")
        * })
        */
       protected $promo;
       
       /**
        * @var string
        *
        * @ORM\Column(name="isValid", type="integer", nullable=true)
        */
       private $isValid;

        public function __construct()
        {
            parent::__construct();
            $this->isValid(true);
        }
    }