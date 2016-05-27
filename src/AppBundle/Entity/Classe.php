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
}
