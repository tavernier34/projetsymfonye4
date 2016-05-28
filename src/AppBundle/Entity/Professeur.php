<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Professeur
 *
 * @ORM\Table(name="PROFESSEUR")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ProfesseurRepository")
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


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Professeur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Professeur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Professeur
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codepostal
     *
     * @param integer $codepostal
     *
     * @return Professeur
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    /**
     * Get codepostal
     *
     * @return integer
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Professeur
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Professeur
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Professeur
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Professeur
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set idProfesseur
     *
     * @param \AppBundle\Entity\Personne $idProfesseur
     *
     * @return Professeur
     */
    public function setIdProfesseur(\AppBundle\Entity\Personne $idProfesseur)
    {
        $this->idProfesseur = $idProfesseur;

        return $this;
    }

    /**
     * Get idProfesseur
     *
     * @return \AppBundle\Entity\Personne
     */
    public function getIdProfesseur()
    {
        return $this->idProfesseur;
    }

    /**
     * Add idModule
     *
     * @param \AppBundle\Entity\Module $idModule
     *
     * @return Professeur
     */
    public function addIdModule(\AppBundle\Entity\Module $idModule)
    {
        $this->idModule[] = $idModule;

        return $this;
    }

    /**
     * Remove idModule
     *
     * @param \AppBundle\Entity\Module $idModule
     */
    public function removeIdModule(\AppBundle\Entity\Module $idModule)
    {
        $this->idModule->removeElement($idModule);
    }

    /**
     * Get idModule
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdModule()
    {
        return $this->idModule;
    }
}
