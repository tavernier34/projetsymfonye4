<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eleve
 *
 * @ORM\Table(name="ELEVE", indexes={@ORM\Index(name="FK_EST_DANS", columns={"ID_CLASSE"})})
 * @ORM\Entity
 */
class Eleve
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
     *   @ORM\JoinColumn(name="ID_ELEVE", referencedColumnName="ID_PERSONNE")
     * })
     */
    private $idEleve;

    /**
     * @var \Classe
     *
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CLASSE", referencedColumnName="ID_CLASSE")
     * })
     */
    private $idClasse;


}
