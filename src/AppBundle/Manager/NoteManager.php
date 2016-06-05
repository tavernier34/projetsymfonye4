<?php
/**
 * Created by PhpStorm.
 * User: termi
 * Date: 04/06/2016
 * Time: 13:55
 */

namespace AppBundle\Manager;


use AppBundle\Entity\Note;
use AppBundle\Entity\NoteRepository;
use AppBundle\Entity\Eleve;
use AppBundle\Entity\EleveRepository;
class NoteManager
{
    protected $entityManager;
    protected $repository;

    public function __construct($em)
    {
        $this->entityManager = $em;
        $this->repository = $em->getRepository('AppBundle:Note');
    }


    public function loadAllNotes()
    {

        $notes = $this->repository->findAll();

        return $notes;
    }

    public function saveNote(Note $note)
    {
        $this->entityManager->persist($note);
        $this->entityManager->flush();
    }

    /**
     * Load Note entity
     *
     * @param Integer $noteId
     */
    public function loadNote($noteId)
    {
        return $this->repository->find($noteId);
    }

    /**
     * Remove Note entity
     *
     * @param Integer $noteId
     */
    public function removeNote(Note $note)
    {
        $this->entityManager->remove($note);
        $this->entityManager->flush();
    }
    
    public function loadAllNotesEleves(){
        $noteseleves = $this->repository->findAllNotesEleves();

        return $noteseleves;
    }
}