<?php

namespace Planning\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publicholidays
 *
 * @ORM\Table(name="publicholidays")
 * @ORM\Entity
 */
class Publicholidays
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;


}
