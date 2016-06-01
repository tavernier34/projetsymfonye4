<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 *
 * @ORM\Table(name="CLASSE")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ClasseRepository")
 */
class Classe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_CLASSE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idClasse;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBELLE_CLASSE", type="string", length=20, nullable=true)
     */
    private $libelleClasse;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Annee", mappedBy="idClasse")
     */
    private $idAnnee;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idAnnee = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idClasse
     *
     * @return integer
     */
    public function getIdClasse()
    {
        return $this->idClasse;
    }

    /**
     * Set libelleClasse
     *
     * @param string $libelleClasse
     *
     * @return Classe
     */
    public function setLibelleClasse($libelleClasse)
    {
        $this->libelleClasse = $libelleClasse;

        return $this;
    }

    /**
     * Get libelleClasse
     *
     * @return string
     */
    public function getLibelleClasse()
    {
        return $this->libelleClasse;
    }

    /**
     * Add idAnnee
     *
     * @param \AppBundle\Entity\Annee $idAnnee
     *
     * @return Classe
     */
    public function addIdAnnee(\AppBundle\Entity\Annee $idAnnee)
    {
        $this->idAnnee[] = $idAnnee;

        return $this;
    }

    /**
     * Remove idAnnee
     *
     * @param \AppBundle\Entity\Annee $idAnnee
     */
    public function removeIdAnnee(\AppBundle\Entity\Annee $idAnnee)
    {
        $this->idAnnee->removeElement($idAnnee);
    }

    /**
     * Get idAnnee
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdAnnee()
    {
        return $this->idAnnee;
    }
}
