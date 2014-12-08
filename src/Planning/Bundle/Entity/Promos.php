<?php

namespace Planning\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promos
 *
 * @ORM\Table(name="promos")
 * @ORM\Entity
 */
class Promos
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
     * @ORM\Column(name="number", type="string", length=9, nullable=true)
     */
    private $number;


}
