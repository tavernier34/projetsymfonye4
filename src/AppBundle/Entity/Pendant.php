<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pendant
 *
 * @ORM\Table(name="PENDANT", indexes={@ORM\Index(name="FK_PENDANT2", columns={"ID_CLASSE"}), @ORM\Index(name="FK_PENDANT3", columns={"ID_SEMESTRE"}), @ORM\Index(name="IDX_613D94C5A16CB4B6", columns={"ID_MODULE"})})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PendantRepository")
 */
class Pendant
{
    /**
     * @var \Module
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Module")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_MODULE", referencedColumnName="ID_MODULE")
     * })
     */
    private $idModule;

    /**
     * @var \Classe
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Classe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CLASSE", referencedColumnName="ID_CLASSE")
     * })
     */
    private $idClasse;

    /**
     * @var \Semestre
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Semestre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_SEMESTRE", referencedColumnName="ID_SEMESTRE")
     * })
     */
    private $idSemestre;



    /**
     * Set idModule
     *
     * @param \AppBundle\Entity\Module $idModule
     *
     * @return Pendant
     */
    public function setIdModule(\AppBundle\Entity\Module $idModule)
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

    /**
     * Set idClasse
     *
     * @param \AppBundle\Entity\Classe $idClasse
     *
     * @return Pendant
     */
    public function setIdClasse(\AppBundle\Entity\Classe $idClasse)
    {
        $this->idClasse = $idClasse;

        return $this;
    }

    /**
     * Get idClasse
     *
     * @return \AppBundle\Entity\Classe
     */
    public function getIdClasse()
    {
        return $this->idClasse;
    }

    /**
     * Set idSemestre
     *
     * @param \AppBundle\Entity\Semestre $idSemestre
     *
     * @return Pendant
     */
    public function setIdSemestre(\AppBundle\Entity\Semestre $idSemestre)
    {
        $this->idSemestre = $idSemestre;

        return $this;
    }

    /**
     * Get idSemestre
     *
     * @return \AppBundle\Entity\Semestre
     */
    public function getIdSemestre()
    {
        return $this->idSemestre;
    }
}
