<?php

namespace AppBundle\Entity;

/**
 * ProfesseurRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProfesseurRepository extends \Doctrine\ORM\EntityRepository
{
    //        SELECT c.libelleClasse, c.idClasse
//                FROM AppBundle:Professeur p, AppBundle:Module m, AppBundle:Pendant pe, AppBundle:Classe c, AppBundle:Semestre s
//                WHERE p.idProfesseur = m.idModule
//    AND m.idModule = pe.idModule
//    AND pe.idClasse = c.idClasse
//    AND pe.idSemestre = s.idSemestre
//    AND s.idSemestre = 1
//    AND p.idProfesseur = 16
//->select('p.nom, m.nomModule')
//->from('AppBundle:Professeur','p' )
//->innerJoin('p.idModule', 'm')
//->where('p.idProfesseur = 16')
//->getQuery()->getResult();
    public function findAllClasses($idProf)
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
                ->select('p.nom, c.libelleClasse, c.idClasse')
                ->from('AppBundle:Professeur','p' )
                ->from('AppBundle:Pendant', 'pe' )
                ->leftJoin('p.idModule', 'm')
                ->leftJoin('pe.idModule', 'mp' )
                ->leftJoin('pe.idClasse', 'c')
                ->leftJoin('pe.idSemestre', 's' )
                ->where('p.idProfesseur = :idProf' )
                ->andWhere('pe.idModule = m.idModule')
                ->andWhere('s.idSemestre = 1')
                ->distinct()
                ->setParameter('idProf', $idProf )
                ->getQuery()->getResult();
    }

    public function findAllModules($idClasse, $idProf)
    {
        return $this->getEntityManager()
//            ->createQuery("SELECT m.nomModule, m.idModule
//                FROM AppBundle:Module m, AppBundle:Pendant pe, AppBundle:Classe c, AppBundle:Semestre s
//                WHERE c.idClasse = pe.idClasse
//                AND pe.idModule = m.idModule
//                AND pe.idSemestre = s.idSemestre
//                AND s.idSemestre = 1
//                AND c.idClasse = '$idClasse'
//                ")
//            ->getResult();
            ->createQueryBuilder()
            ->select('m.nomModule, m.idModule')
            ->from('AppBundle:Professeur','p' )
            ->from('AppBundle:Pendant', 'pe' )
            ->leftJoin('p.idModule', 'm')
            ->leftJoin('pe.idModule', 'mp' )
            ->leftJoin('pe.idClasse', 'c')
            ->leftJoin('pe.idSemestre', 's' )
            ->where('p.idProfesseur = :idProf' )
            ->andWhere('c.idClasse = :idClasse')
            ->andWhere('pe.idModule = m.idModule')
            ->andWhere('s.idSemestre = 1')
            ->distinct()
            ->setParameter('idProf', $idProf )
            ->setParameter('idClasse', $idClasse )
            ->getQuery()->getResult();
    }

    public function moyenneClasse($id)
    {
        return $this->getEntityManager()
            ->createQuery("select avg(n.note) as moyenne
                from AppBundle:Classe c, AppBundle:Note n, AppBundle:Module m, AppBundle:Pendant pe
                where c.idClasse = pe.idClasse
                and pe.idModule = m.idModule
                and m.idModule = n.idModule
                and c.idClasse = '$id'")
            ->getResult();
    }

    public function moyenneClasseModule($idClasse, $idModule)
    {
        return $this->getEntityManager()
            ->createQuery("select avg(n.note) as moyenne
                from AppBundle:Classe c, AppBundle:Note n, AppBundle:Module m, AppBundle:Pendant pe
                where c.idClasse = pe.idClasse
                and pe.idModule = m.idModule
                and m.idModule = n.idModule
                and c.idClasse = '$idClasse'
                and m.idModule = '$idModule'")
            ->getResult();
    }

    public function moyenneClasseModuleEleve($idClasse, $idModule, $idEleve)
    {
        return $this->getEntityManager()
            ->createQuery("select avg(n.note) as moyenne
                from AppBundle:Classe c, AppBundle:Note n, AppBundle:Module m, AppBundle:Pendant pe, AppBundle:Eleve e 
                where c.idClasse = pe.idClasse
                and pe.idModule = m.idModule
                and m.idModule = n.idModule
                AND n.idEleve = e.idEleve
                and e.idEleve = '$idEleve'
                and c.idClasse = '$idClasse'
                and m.idModule = '$idModule'")
            ->getResult();
    }

    public function findAllElevesModule($idModule, $idClasse)
    {
        return $this->getEntityManager()
            ->createQuery("SELECT IDENTITY(e.idEleve) as idEleve, e.nom, e.prenom
            FROM AppBundle:Classe c, AppBundle:Eleve e, AppBundle:Pendant pe, AppBundle:Module m, AppBundle:Semestre s  
            WHERE e.idClasse = c.idClasse
            AND c.idClasse = pe.idClasse
            AND pe.idModule = m.idModule
            AND pe.idSemestre = s.idSemestre
            AND s.idSemestre = 1
            AND c.idClasse = '$idClasse'
            AND m.idModule = '$idModule'
                ")
            ->getResult();
    }

    public function findAllNotes($idClasse, $idModule, $idEleve)
    {
        return $this->getEntityManager()
            ->createQuery("SELECT n.note, n.idNote as idNote, n.dateNote
                FROM AppBundle:Note n, AppBundle:Module m, AppBundle:Eleve el, AppBundle:Classe c, AppBundle:Pendant pe, AppBundle:Semestre s  
                WHERE el.idEleve=n.idEleve 
                AND n.idModule=m.idModule
                AND m.idModule = pe.idModule
                AND pe.idClasse = c.idClasse
                AND pe.idSemestre = s.idSemestre
                AND s.idSemestre = 1 
                AND c.idClasse = '$idClasse'                
                AND el.idEleve = '$idEleve'
                AND m.idModule = '$idModule'
                
                
                ")
            ->getResult();
    }

    public function getNomModule($idModule)
    {
        return $this->getEntityManager()
            ->createQuery("SELECT m.nomModule
            FROM AppBundle:Module m
            WHERE m.idModule = '$idModule'
            ")
            ->getSingleResult();
    }

    public function getNomClasse($idClasse)
    {
        return $this->getEntityManager()
            ->createQuery("SELECT c.libelleClasse
            FROM AppBundle:Classe c
            WHERE c.idClasse = '$idClasse'
            ")
            ->getSingleResult();
    }

    public function getLibelleClasse($idClasse)
    {
        return $this->getEntityManager()
            ->createQuery("SELECT cl.libelleClasse
            FROM AppBundle:Classe cl
            WHERE cl.idClasse = '$idClasse'
            ")
            ->getSingleResult();
    }

    public function findAllEleves($idModule, $idClasse)
    {
        return $this->getEntityManager()
            ->createQuery("SELECT e.nom, e.prenom
            FROM AppBundle:Classe c, AppBundle:Eleve e, AppBundle:Pendant pe, AppBundle:Module m, AppBundle:Semestre s  
            WHERE e.idClasse = c.idClasse
            AND c.idClasse = pe.idClasse
            AND pe.idModule = m.idModule
            AND pe.idSemestre = s.idSemestre
            AND s.idSemestre = 1
            AND c.idClasse = '$idClasse'
            AND m.idModule = '$idModule'
                ")
            ->getResult();
    }


    public function findAllAbsences($idProf)
    {
        return $this->getEntityManager()
            ->createQuery("SELECT a.justificatif, a.motif
                FROM AppBundle:Absence a, AppBundle:Personne p 
                WHERE a.idPersonne=p.idPersonne 
                AND p.idPersonne = '$idProf'
                
                ")
            ->getResult();
    }
}
