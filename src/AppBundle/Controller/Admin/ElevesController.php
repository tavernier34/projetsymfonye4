<?php
/**
 * Created by PhpStorm.
 * User: Jérôme
 * Date: 27/05/2016
 * Time: 16:08
 */

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use AppBundle\Entity\Eleve;
use AppBundle\Entity\Classe;
use AppBundle\Entity\Absence;
use AppBundle\Entity\Module;
use AppBundle\Manager\EleveManager;


class ElevesController extends Controller
{
    private function getManager()
    {
        return new EleveManager($this->get('doctrine')->getManager());
    }

    /**
     * @Route("/admin/eleve/", name="admin_eleve_homepage")
     */

    public function indexAction()
    {
       return $this->render('admin/eleve/index.html.twig');
    }

    /**
     * @Route("/admin/eleve/note/", name="admin_eleve_affichenote")
     */

    public function noteAction()
    {
        $idEleve = $this->getUser()->getIdPersonne();
//        $classe = $this->getManager()->loadClasseEleve($idEleve);
        
        // Obtention du manager puis des notes d'un éleve
        $modules = $this->getManager()->loadAllModules($idEleve);
        foreach ($modules as $module){
            
            $moyennes = $this->getManager()->loadMoyenneModule($module["idModule"], $idEleve);
            foreach ($moyennes as $moyenne) {
                $moduleNote[$module["nomModule"]]["moyenne"] = $moyenne["moyenne"];
            }

//            $moyennesMin = $this->getManager()->loadMoyenneModuleMin($module["idModule"], $classe['idClasse']);

            $notes = $this->getManager()->loadAllNotes($module["idModule"], $idEleve);
            foreach ($notes as $note) {

                $moduleNote[$module["nomModule"]][] = [$note["note"]];
            }
        }

        $moyenneGen = $this->getManager()->loadMoyenneGen($idEleve);

        return $this->render('admin/eleve/note.html.twig',array("arrayNotes" => $moduleNote, "moyenneGen" => $moyenneGen));
    }

    /**
     * @Route("/admin/eleve/absence/", name="admin_eleve_afficheabsence")
     */

    public function absenceAction()
    {
        $idEleve = $this->getUser()->getIdPersonne();
        // Obtention du manager puis des absences d'un éleve
        $absences = $this->getManager()->loadAllAbsences($idEleve);

        return $this->render('admin/eleve/absence.html.twig', array("arrayAbsences" => $absences));
    }
}