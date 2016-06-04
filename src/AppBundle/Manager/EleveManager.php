<?php

/**
 * Created by PhpStorm.
 * User: Jérôme
 * Date: 27/05/2016
 * Time: 09:54
 */

namespace AppBundle\Manager;


use AppBundle\Entity\Note;
use AppBundle\Entity\NoteRepository;
use AppBundle\Entity\Eleve;
use AppBundle\Entity\EleveRepository;

class EleveManager
{
    protected $entityManager;
    protected $repository;

    public function __construct($em)
    {
        $this->entityManager = $em;
        $this->repository = $em->getRepository('AppBundle:Eleve');
    }

    public function loadAllModules()
    {
        $modules = $this->repository->findAllModules();

        return $modules;
    }
    
    public function loadAllNotes($id)
    {
        $notes = $this->repository->findAllNotes($id);

        return $notes;
    }

    public function loadAllAbsences()
    {

        $absences = $this->repository->findAllAbsences();

        return $absences;
    }
    
/*    public function loadPatronyme()
    {
        $patronyme = $this->repository->getPatronyme();
        
        return $patronyme;
    }*/
}