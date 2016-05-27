<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Semestre
 *
 * @ORM\Table(name="SEMESTRE")
 * @ORM\Entity
 */
class Semestre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_SEMESTRE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSemestre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATEDEBUT_SEMESTRE", type="date", nullable=true)
     */
    private $datedebutSemestre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATEFIN_SEMESTRE", type="date", nullable=true)
     */
    private $datefinSemestre;

    /**
     * @var integer
     *
     * @ORM\Column(name="ANNEE_SEMESTRE", type="integer", nullable=true)
     */
    private $anneeSemestre;


}
