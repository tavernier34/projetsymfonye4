<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Absence
 *
 * @ORM\Table(name="ABSENCE", indexes={@ORM\Index(name="FK_POSSEDE", columns={"ID_PERSONNE"})})
 * @ORM\Entity
 */
class Absence
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_ABSENCE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAbsence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATEDEBUT_ABSENCE", type="date", nullable=true)
     */
    private $datedebutAbsence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATEFIN_ABSENCE", type="date", nullable=true)
     */
    private $datefinAbsence;

    /**
     * @var boolean
     *
     * @ORM\Column(name="JUSTIFICATIF", type="boolean", nullable=true)
     */
    private $justificatif;

    /**
     * @var string
     *
     * @ORM\Column(name="MOTIF", type="string", length=255, nullable=true)
     */
    private $motif;

    /**
     * @var \Personne
     *
     * @ORM\ManyToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PERSONNE", referencedColumnName="ID_PERSONNE")
     * })
     */
    private $idPersonne;


}
