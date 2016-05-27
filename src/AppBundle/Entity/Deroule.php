<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Deroule
 *
 * @ORM\Table(name="DEROULE")
 * @ORM\Entity
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


}
