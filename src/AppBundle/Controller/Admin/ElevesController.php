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
        // Obtention du manager puis des notes d'un éleve
        $modules = $this->getManager()->loadAllModules();


        foreach ($modules as $module){
            $notes = $this->getManager()->loadAllNotes($module["idModule"]);
            foreach ($notes as $note) {
                $moduleNote[$module["idModule"]][] = [$note["note"]];
            }
        }

        return $this->render('admin/eleve/note.html.twig',array("arrayModules" => $modules, "arrayNotes" => $moduleNote));
    }

    /**
     * @Route("/admin/eleve/absence/", name="admin_eleve_afficheabsence")
     */

    public function absenceAction()
    {
        // Obtention du manager puis des absences d'un éleve
        $absences = $this->getManager()->loadAllAbsences();

        return $this->render('admin/absence.html.twig', array("arrayAbsences" => $absences));
    }
}