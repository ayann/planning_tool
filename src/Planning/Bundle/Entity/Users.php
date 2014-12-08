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


}
