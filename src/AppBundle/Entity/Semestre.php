<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Semestre
 *
 * @ORM\Table(name="SEMESTRE")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\SemestreRepository")
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



    /**
     * Get idSemestre
     *
     * @return integer
     */
    public function getIdSemestre()
    {
        return $this->idSemestre;
    }

    /**
     * Set datedebutSemestre
     *
     * @param \DateTime $datedebutSemestre
     *
     * @return Semestre
     */
    public function setDatedebutSemestre($datedebutSemestre)
    {
        $this->datedebutSemestre = $datedebutSemestre;

        return $this;
    }

    /**
     * Get datedebutSemestre
     *
     * @return \DateTime
     */
    public function getDatedebutSemestre()
    {
        return $this->datedebutSemestre;
    }

    /**
     * Set datefinSemestre
     *
     * @param \DateTime $datefinSemestre
     *
     * @return Semestre
     */
    public function setDatefinSemestre($datefinSemestre)
    {
        $this->datefinSemestre = $datefinSemestre;

        return $this;
    }

    /**
     * Get datefinSemestre
     *
     * @return \DateTime
     */
    public function getDatefinSemestre()
    {
        return $this->datefinSemestre;
    }

    /**
     * Set anneeSemestre
     *
     * @param integer $anneeSemestre
     *
     * @return Semestre
     */
    public function setAnneeSemestre($anneeSemestre)
    {
        $this->anneeSemestre = $anneeSemestre;

        return $this;
    }

    /**
     * Get anneeSemestre
     *
     * @return integer
     */
    public function getAnneeSemestre()
    {
        return $this->anneeSemestre;
    }
}
