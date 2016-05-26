<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="NOTE", indexes={@ORM\Index(name="FK_DANS", columns={"ID_MODULE"}), @ORM\Index(name="FK_RECOIT", columns={"ID_ELEVE"})})
 * @ORM\Entity
 */
class Note
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_NOTE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNote;

    /**
     * @var integer
     *
     * @ORM\Column(name="NOTE", type="integer", nullable=true)
     */
    private $note;

    /**
     * @var integer
     *
     * @ORM\Column(name="VALEURMAX", type="integer", nullable=true)
     */
    private $valeurmax;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_NOTE", type="date", nullable=true)
     */
    private $dateNote;

    /**
     * @var \Eleve
     *
     * @ORM\ManyToOne(targetEntity="Eleve")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ELEVE", referencedColumnName="ID_ELEVE")
     * })
     */
    private $idEleve;

    /**
     * @var \Module
     *
     * @ORM\ManyToOne(targetEntity="Module")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_MODULE", referencedColumnName="ID_MODULE")
     * })
     */
    private $idModule;


}
