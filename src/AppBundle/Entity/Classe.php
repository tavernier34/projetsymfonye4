<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 *
 * @ORM\Table(name="CLASSE")
 * @ORM\Entity
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

}
