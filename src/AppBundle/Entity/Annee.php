<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annee
 *
 * @ORM\Table(name="ANNEE")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AnneeRepository")
 */
class Annee
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_ANNEE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAnnee;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBELLE_ANNEE", type="string", length=20, nullable=true)
     */
    private $libelleAnnee;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Classe", inversedBy="idAnnee")
     * @ORM\JoinTable(name="derouler",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_ANNEE", referencedColumnName="ID_ANNEE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_CLASSE", referencedColumnName="ID_CLASSE")
     *   }
     * )
     */
    private $idClasse;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idClasse = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
