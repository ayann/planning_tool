<?php

namespace Planning\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classrooms
 *
 * @ORM\Table(name="classrooms", indexes={@ORM\Index(name="fk_class_rooms_establishments1_idx", columns={"establishments_id"})})
 * @ORM\Entity(repositoryClass="PlanningBundle\Entity\ClassroomsRepository")
 */
class Classrooms
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
     * @var integer
     *
     * @ORM\Column(name="number_of_computer", type="integer", nullable=true)
     */
    private $numberOfComputer;

    /**
     * @var string
     *
     * @ORM\Column(name="number_of_class", type="string", length=45, nullable=true)
     */
    private $numberOfClass;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacity_of_class", type="integer", nullable=true)
     */
    private $capacityOfClass;

    /**
     * @var integer
     *
     * @ORM\Column(name="establishments_id", type="integer", nullable=false)
     */
    private $establishmentsId;


}
