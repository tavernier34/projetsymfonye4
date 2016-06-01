<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="NOTE", indexes={@ORM\Index(name="FK_DANS", columns={"ID_MODULE"}), @ORM\Index(name="FK_RECOIT", columns={"ID_ELEVE"})})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\NoteRepository")
 */
class Note
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_NOTE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNote;

    /**
     * @var integer
     *
     * @ORM\Column(name="NOTE", type="integer", nullable=true)
     */
    private $note;

    /**
     * @var integer
     *
     * @ORM\Column(name="VALEURMAX", type="integer", nullable=true)
     */
    private $valeurmax;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_NOTE", type="date", nullable=true)
     */
    private $dateNote;

    /**
     * @var \Eleve
     *
     * @ORM\ManyToOne(targetEntity="Eleve")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ELEVE", referencedColumnName="ID_ELEVE")
     * })
     */
    private $idEleve;

    /**
     * @var \Module
     *
     * @ORM\ManyToOne(targetEntity="Module")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_MODULE", referencedColumnName="ID_MODULE")
     * })
     */
    private $idModule;



    /**
     * Get idNote
     *
     * @return integer
     */
    public function getIdNote()
    {
        return $this->idNote;
    }

    /**
     * Set note
     *
     * @param integer $note
     *
     * @return Note
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set valeurmax
     *
     * @param integer $valeurmax
     *
     * @return Note
     */
    public function setValeurmax($valeurmax)
    {
        $this->valeurmax = $valeurmax;

        return $this;
    }

    /**
     * Get valeurmax
     *
     * @return integer
     */
    public function getValeurmax()
    {
        return $this->valeurmax;
    }

    /**
     * Set dateNote
     *
     * @param \DateTime $dateNote
     *
     * @return Note
     */
    public function setDateNote($dateNote)
    {
        $this->dateNote = $dateNote;

        return $this;
    }

    /**
     * Get dateNote
     *
     * @return \DateTime
     */
    public function getDateNote()
    {
        return $this->dateNote;
    }

    /**
     * Set idEleve
     *
     * @param \AppBundle\Entity\Eleve $idEleve
     *
     * @return Note
     */
    public function setIdEleve(\AppBundle\Entity\Eleve $idEleve = null)
    {
        $this->idEleve = $idEleve;

        return $this;
    }

    /**
     * Get idEleve
     *
     * @return \AppBundle\Entity\Eleve
     */
    public function getIdEleve()
    {
        return $this->idEleve;
    }

    /**
     * Set idModule
     *
     * @param \AppBundle\Entity\Module $idModule
     *
     * @return Note
     */
    public function setIdModule(\AppBundle\Entity\Module $idModule = null)
    {
        $this->idModule = $idModule;

        return $this;
    }

    /**
     * Get idModule
     *
     * @return \AppBundle\Entity\Module
     */
    public function getIdModule()
    {
        return $this->idModule;
    }
}
