<?php

namespace AppBundle\Entity;

/**
 * EleveRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EleveRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllModules()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT DISTINCT m.nomModule, m.idModule
                FROM AppBundle:Note n, AppBundle:Module m, AppBundle:Eleve el 
                WHERE el.idEleve=n.idEleve 
                AND n.idModule=m.idModule
                AND el.idEleve = 1
                
                ')
            ->getResult();
    }

    public function findAllNotes($id)
    {
        return $this->getEntityManager()
            ->createQuery("SELECT n.note
                FROM AppBundle:Note n, AppBundle:Module m, AppBundle:Eleve el 
                WHERE el.idEleve=n.idEleve 
                AND n.idModule=m.idModule
                AND el.idEleve = 1
                AND m.idModule = '$id'
                
                ")
            ->getResult();
    }
    
    public function findAllAbsences()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT a.justificatif, a.motif
                FROM AppBundle:Absence a, AppBundle:Personne p 
                WHERE a.idPersonne=p.idPersonne 
                AND p.idPersonne = 1
                
                ')
            ->getResult();
    }
    
   public function findAllEleves()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT e.nom, e.prenom
                FROM AppBundle:Eleve e
                ')
            ->getResult();
    }
}
