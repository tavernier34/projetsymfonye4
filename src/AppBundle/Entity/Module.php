<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Module
 *
 * @ORM\Table(name="MODULE")
 * @ORM\Entity
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

}
