<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Module
 *
 * @ORM\Table(name="MODULE")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ModuleRepository")
 */
class Module
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_MODULE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModule;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_MODULE", type="string", length=30, nullable=true)
     */
    private $nomModule;

    /**
     * @var string
     *
     * @ORM\Column(name="TYPE_MODULE", type="string", length=30, nullable=true)
     */
    private $typeModule;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Professeur", mappedBy="idModule")
     */
    private $idProfesseur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idProfesseur = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idModule
     *
     * @return integer
     */
    public function getIdModule()
    {
        return $this->idModule;
    }

    /**
     * Set nomModule
     *
     * @param string $nomModule
     *
     * @return Module
     */
    public function setNomModule($nomModule)
    {
        $this->nomModule = $nomModule;

        return $this;
    }

    /**
     * Get nomModule
     *
     * @return string
     */
    public function getNomModule()
    {
        return $this->nomModule;
    }

    /**
     * Set typeModule
     *
     * @param string $typeModule
     *
     * @return Module
     */
    public function setTypeModule($typeModule)
    {
        $this->typeModule = $typeModule;

        return $this;
    }

    /**
     * Get typeModule
     *
     * @return string
     */
    public function getTypeModule()
    {
        return $this->typeModule;
    }

    /**
     * Add idProfesseur
     *
     * @param \AppBundle\Entity\Professeur $idProfesseur
     *
     * @return Module
     */
    public function addIdProfesseur(\AppBundle\Entity\Professeur $idProfesseur)
    {
        $this->idProfesseur[] = $idProfesseur;

        return $this;
    }

    /**
     * Remove idProfesseur
     *
     * @param \AppBundle\Entity\Professeur $idProfesseur
     */
    public function removeIdProfesseur(\AppBundle\Entity\Professeur $idProfesseur)
    {
        $this->idProfesseur->removeElement($idProfesseur);
    }

    /**
     * Get idProfesseur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdProfesseur()
    {
        return $this->idProfesseur;
    }
}
