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

class EleveManager
{
    protected $entityManager;
    protected $repository;

    public function __construct($em)
    {
        $this->entityManager = $em;
        $this->repository = $em->getRepository('AppBundle:Eleve');
    }


    public function loadAllNotes()
    {

        $notes = $this->repository->findAllNotes();

        return $notes;
    }

    public function loadAllAbsences()
    {

        $absences = $this->repository->findAllAbsences();

        return $absences;
    }
}