<?php

namespace Planning\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plannings
 *
 * @ORM\Table(name="plannings")
 * @ORM\Entity(repositoryClass="PlanningBundle\Entity\PlanningsRepository")
 */
class Plannings
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
     * @ORM\Column(name="start_time", type="datetime", nullable=true)
     */
    private $startTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_time", type="datetime", nullable=true)
     */
    private $endTime;

    /**
     * @var string
     *
     * @ORM\Column(name="month", type="string", length=45, nullable=true)
     */
    private $month;

    /**
     * @var integer
     *
     * @ORM\Column(name="class_rooms_id", type="integer", nullable=false)
     */
    private $classRoomsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="promos_id", type="integer", nullable=false)
     */
    private $promosId;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=45, nullable=true)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;


}
