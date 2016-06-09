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

    public function loadAllClasses()
    {
        
            $classes = $this->repository->findAllClasses();

        return $classes;
    }

    public function loadAllEleves($idModule, $idClasse)
    {

        $eleves = $this->repository->findAllEleves($idModule, $idClasse);

        return $eleves;
    }

    public function loadAllElevesModule($idModule, $idClasse)
    {

        $eleves = $this->repository->findAllElevesModule($idModule, $idClasse);

        return $eleves;
    }

    public function loadMoyennesClasses($id)
    {

        $moyenne = $this->repository->moyenneClasse($id);

        return $moyenne;
    }

    public function loadMoyennesClassesModules($idClasse, $idModule)
    {

        $moyenne = $this->repository->moyenneClasseModule($idClasse, $idModule);

        return $moyenne;
    }

    public function loadMoyennesClassesModulesEleves($idClasse, $idModule, $idEleve)
    {

        $moyenne = $this->repository->moyenneClasseModuleEleve($idClasse, $idModule, $idEleve);

        return $moyenne;
    }
    
    public function loadAllNotes($idClasse, $idModule, $idEleve)
    {
        $notes = $this->repository->findAllNotes($idClasse, $idModule, $idEleve);
        
        return $notes;
    }
    
    public function loadNomModule($idModule)
    {
        $nomModule = $this->repository->getNomModule($idModule);
        
        return $nomModule;
    }

    public function loadLibelleClasse($idClasse)
    {
        $libelleClasse = $this->repository->getLibelleClasse($idClasse);

        return $libelleClasse;
    }
    
    public function loadAllModules($idClasse)
    {
        $modules = $this->repository->findAllModules($idClasse);
        
        return $modules;
    }

    public function loadMoyennesModules($idClasse, $idModule)
    {

        $moyenne = $this->repository->moyenneClasse($idClasse, $idModule);

        return $moyenne;
    }

    public function loadAllAbsences()
    {

        $absences = $this->repository->findAllAbsences();

        return $absences;
    }

    
}