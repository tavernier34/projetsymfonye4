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
    public function findAllNotes()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT n.note, n.dateNote, el.prenom, el.nom, m.nomModule
                FROM AppBundle:Note n, AppBundle:Module m, AppBundle:Eleve el WHERE el.idEleve=n.idEleve AND n.idModule=m.idModule
                
                ')
            ->getResult();
    }
    public function findAllAbsences()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT a.justificatif, a.motif
                FROM AppBundle:Absence a, AppBundle:Personne p WHERE a.idPersonne=p.idPersonne 
                
                ')
            ->getResult();
    }
}
