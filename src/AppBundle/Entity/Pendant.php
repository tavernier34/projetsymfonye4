<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pendant
 *
 * @ORM\Table(name="PENDANT", indexes={@ORM\Index(name="FK_PENDANT2", columns={"ID_CLASSE"}), @ORM\Index(name="FK_PENDANT3", columns={"ID_SEMESTRE"}), @ORM\Index(name="IDX_613D94C5A16CB4B6", columns={"ID_MODULE"})})
 * @ORM\Entity
 */
class Pendant
{
    /**
     * @var \Module
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Module")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_MODULE", referencedColumnName="ID_MODULE")
     * })
     */
    private $idModule;

    /**
     * @var \Classe
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Classe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CLASSE", referencedColumnName="ID_CLASSE")
     * })
     */
    private $idClasse;

    /**
     * @var \Semestre
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Semestre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_SEMESTRE", referencedColumnName="ID_SEMESTRE")
     * })
     */
    private $idSemestre;


}
