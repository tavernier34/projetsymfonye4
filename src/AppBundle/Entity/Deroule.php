<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Deroule
 *
 * @ORM\Table(name="DEROULE")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DerouleRepository")
 */
class Deroule
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_CLASSE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idClasse;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_ANNEE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idAnnee;



    /**
     * Set idClasse
     *
     * @param integer $idClasse
     *
     * @return Deroule
     */
    public function setIdClasse($idClasse)
    {
        $this->idClasse = $idClasse;

        return $this;
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
     * Set idAnnee
     *
     * @param integer $idAnnee
     *
     * @return Deroule
     */
    public function setIdAnnee($idAnnee)
    {
        $this->idAnnee = $idAnnee;

        return $this;
    }

    /**
     * Get idAnnee
     *
     * @return integer
     */
    public function getIdAnnee()
    {
        return $this->idAnnee;
    }
}
