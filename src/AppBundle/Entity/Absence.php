<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Absence
 *
 * @ORM\Table(name="ABSENCE", indexes={@ORM\Index(name="FK_POSSEDE", columns={"ID_PERSONNE"})})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AbsenceRepository")
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



    /**
     * Get idAbsence
     *
     * @return integer 
     */
    public function getIdAbsence()
    {
        return $this->idAbsence;
    }

    /**
     * Set datedebutAbsence
     *
     * @param \DateTime $datedebutAbsence
     * @return Absence
     */
    public function setDatedebutAbsence($datedebutAbsence)
    {
        $this->datedebutAbsence = $datedebutAbsence;

        return $this;
    }

    /**
     * Get datedebutAbsence
     *
     * @return \DateTime 
     */
    public function getDatedebutAbsence()
    {
        return $this->datedebutAbsence;
    }

    /**
     * Set datefinAbsence
     *
     * @param \DateTime $datefinAbsence
     * @return Absence
     */
    public function setDatefinAbsence($datefinAbsence)
    {
        $this->datefinAbsence = $datefinAbsence;

        return $this;
    }

    /**
     * Get datefinAbsence
     *
     * @return \DateTime 
     */
    public function getDatefinAbsence()
    {
        return $this->datefinAbsence;
    }

    /**
     * Set justificatif
     *
     * @param boolean $justificatif
     * @return Absence
     */
    public function setJustificatif($justificatif)
    {
        $this->justificatif = $justificatif;

        return $this;
    }

    /**
     * Get justificatif
     *
     * @return boolean 
     */
    public function getJustificatif()
    {
        return $this->justificatif;
    }

    /**
     * Set motif
     *
     * @param string $motif
     * @return Absence
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string 
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set idPersonne
     *
     * @param \AppBundle\Entity\Personne $idPersonne
     * @return Absence
     */
    public function setIdPersonne(\AppBundle\Entity\Personne $idPersonne = null)
    {
        $this->idPersonne = $idPersonne;

        return $this;
    }

    /**
     * Get idPersonne
     *
     * @return \AppBundle\Entity\Personne 
     */
    public function getIdPersonne()
    {
        return $this->idPersonne;
    }
}
