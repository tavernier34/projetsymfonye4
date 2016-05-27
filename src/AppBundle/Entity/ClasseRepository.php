<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ClasseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClasseRepository extends EntityRepository
{
    public function findAllClasses()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT c.idClasse, c.libelleClasse
                FROM AppBundle:Classe c
                ')
            ->getResult();
    }
}
