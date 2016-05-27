<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Professeur
 *
 * @ORM\Table(name="PROFESSEUR")
 * @ORM\Entity
 */
class Professeur
{
    /**
     * @var string
     *
     * @ORM\Column(name="NOM", type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="PRENOM", type="string", length=50, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="ADRESSE", type="string", length=50, nullable=true)
     */
    private $adresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="CODEPOSTAL", type="integer", nullable=true)
     */
    private $codepostal;

    /**
     * @var string
     *
     * @ORM\Column(name="VILLE", type="string", length=20, nullable=true)
     */
    private $ville;

    /**
     * @var integer
     *
     * @ORM\Column(name="TELEPHONE", type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="EMAIL", type="string", length=80, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="PASSWORD", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var \Personne
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PROFESSEUR", referencedColumnName="ID_PERSONNE")
     * })
     */
    private $idProfesseur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Module", inversedBy="idProfesseur")
     * @ORM\JoinTable(name="enseigne",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_PROFESSEUR", referencedColumnName="ID_PROFESSEUR")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_MODULE", referencedColumnName="ID_MODULE")
     *   }
     * )
     */
    private $idModule;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idModule = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
