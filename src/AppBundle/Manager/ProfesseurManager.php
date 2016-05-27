<?php

/**
 * Created by PhpStorm.
 * User: Jérôme
 * Date: 27/05/2016
 * Time: 09:54
 */

namespace AppBundle\Manager;


use AppBundle\Entity\Professeur;
use AppBundle\Entity\ProfesseurRepository;
use AppBundle\Entity\Note;
use AppBundle\Entity\NoteRepository;
use AppBundle\Entity\Classe;
use AppBundle\Entity\ClasseRepository;

class ProfesseurManager
{
    protected $entityManager;
    protected $repository;

    public function __construct($em)
    {
        $this->entityManager = $em;
        $this->repository = $em->getRepository('AppBundle:Professeur');
    }

    public function loadAllClasses($orderedByLibelle = true)
    {
        if ($orderedByLibelle)
            $classes = $this->repository->loadAllClasses();
        else
            $classes = $this->repository->findAll();

        return $classes;
    }

    /**
     * Load Professeur entity
     *
     * @param Integer $idProfesseur
     */
    public function loadProfesseur($idProfesseur)
    {
        return $this->repository->find($idProfesseur);
    }
}