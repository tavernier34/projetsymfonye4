<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annee
 *
 * @ORM\Table(name="ANNEE")
 * @ORM\Entity
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
     * @ORM\Column(name="LIBELLE", type="string", length=30, nullable=true)
     */
    private $libelle;


}
