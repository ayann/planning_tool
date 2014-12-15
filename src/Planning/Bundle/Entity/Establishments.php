<?php

namespace Planning\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Establishments
 *
 * @ORM\Table(name="establishments")
 * @ORM\Entity(repositoryClass="PlanningBundle\Entity\EstablishmentsRepository")
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


}
