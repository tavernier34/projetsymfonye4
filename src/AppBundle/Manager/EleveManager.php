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

    public function loadAllModules($idEleve)
    {
        $modules = $this->repository->findAllModules($idEleve);

        return $modules;
    }

    public function loadMoyenneModule($idModule, $idEleve)
    {
        $moyenne = $this->repository->moyenneModule($idModule, $idEleve);

        return $moyenne;
    }

//    public function loadMoyenneModuleMin($idModule, $idClasse)
//    {
//        $avgMin = $this->repository->moyenneModuleMin($idModule, $idClasse);
//
//        return $avgMin;
//    }
//    
//    public function loadClasseEleve($idEleve)
//    {
//        $classe = $this->repository->findClasseEleve($idEleve);
//        
//        return $classe;
//    }
//    

    public function loadMoyenneGen($idEleve)
    {
        $moyenne = $this->repository->moyenneGen($idEleve);
        
        return $moyenne;
    }
    
    public function loadAllNotes($idModule, $idEleve)
    {
        $notes = $this->repository->findAllNotes($idModule, $idEleve);

        return $notes;
    }

    public function loadAllAbsences($idEleve)
    {

        $absences = $this->repository->findAllAbsences($idEleve);

        return $absences;
    }
    
/*    public function loadPatronyme()
    {
        $patronyme = $this->repository->getPatronyme();
        
        return $patronyme;
    }*/
}