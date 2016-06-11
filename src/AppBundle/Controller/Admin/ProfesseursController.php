<?php

/**
 * Created by PhpStorm.
 * User: Jérôme
 * Date: 27/05/2016
 * Time: 09:14
 */

namespace AppBundle\Controller\Admin;


use AppBundle\Entity\Note;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use AppBundle\Entity\Professeur;
use AppBundle\Manager\ProfesseurManager;





class ProfesseursController extends Controller
{
    private function getManager()
    {
        return new ProfesseurManager($this->get('doctrine')->getManager());
    }

    /**

     * @Route("/admin/professeur/", name="admin_professeur_homepage")
     */

    public function indexAction()
    {
             return $this->render('admin/professeur/index.html.twig');
    }


    /**
     * @Route("/admin/professeur/classe", name="admin_professeur_listeClasse")
     */
    
    public function classeAction()
    {
        $idProf = $this->getUser()->getIdPersonne();
    // Obtention du manager puis des classes
        $classes = $this->getManager()->loadAllClasses($idProf);
        

        foreach ($classes as $classe){
            $moyennes = $this->getManager()->loadMoyennesClasses($classe["idClasse"]);
            foreach ($moyennes as $moyenne) {
                $moyenneClasse[$classe["idClasse"]][$classe["libelleClasse"]][] = [$moyenne["moyenne"]];
            }
        }

        return $this->render('admin/professeur/classe.html.twig', array("arrayClasses" => $moyenneClasse));
    }

    /**
     * @Route("/admin/professeur/classe/matiere/{idClasse}", name="admin_professeur_listeMatiere")
     */

    public function MatiereAction($idClasse)
    {
        $idProf = $this->getUser()->getIdPersonne();
        // Obtention du manager puis des classes
        $modules = $this->getManager()->loadAllModules($idClasse, $idProf);

        foreach ($modules as $module){
            $moyennes = $this->getManager()->loadMoyennesClassesModules($idClasse, $module["idModule"]);
            var_dump($moyennes);
            foreach ($moyennes as $moyenne) {
                $moyenneModule[$module["idModule"]][$module["nomModule"]][$moyenne["moyenne"]][]=[$idClasse];
            }
        }

        $libelleClasse = $this->getManager()->loadLibelleClasse($idClasse);
        return $this->render('admin/professeur/listeMatiere.html.twig', array("arrayModule" => $moyenneModule, "libelleClasse" => $libelleClasse));
    }

    /**
     * @Route("/admin/professeur/classe/matiere/eleve/{idModule}/{idClasse}", name="admin_professeur_listeEleve")
     */

    public function EleveAction($idModule, $idClasse)
    {
        // Obtention du manager puis des classes
        $eleves = $this->getManager()->loadAllElevesModule($idModule, $idClasse);

        foreach ($eleves as $eleve){
            $moyennes = $this->getManager()->loadMoyennesClassesModulesEleves($idClasse, $idModule, $eleve["idEleve"]);

            foreach ($moyennes as $moyenne) {
                $moduleNote[$eleve["idEleve"]]["nom"] = $eleve["nom"];
                $moduleNote[$eleve["idEleve"]]["prenom"] = $eleve["prenom"];
                $moduleNote[$eleve["idEleve"]]["moyenne"] = $moyenne["moyenne"];
                $notes = $this->getManager()->loadAllNotes($idClasse, $idModule, $eleve["idEleve"]);

                foreach ($notes as $note) {

                    $moduleNote[$eleve["idEleve"]]["notes"][$note["idNote"]]["date"] = $note["dateNote"];
                    $moduleNote[$eleve["idEleve"]]["notes"][$note["idNote"]]["note"] = $note["note"];
                    
                }
            }
        }
        
        $nomModule = $this->getManager()->loadNomModule($idModule);
        $nomClasse = $this->getManager()->loadNomClasse($idClasse);
        

        return $this->render('admin/professeur/listeEleve.html.twig', array("arrayEleves" => $moduleNote, "idClasse" => $idClasse, "nomModule" => $nomModule, "idModule" => $idModule, "libelleClasse" => $nomClasse));
        
        
    }

    /**
     * @Route("/admin/professeur/absence/", name="admin_professeur_afficheabsence")
     */

    public function absenceAction()
    {
        $idProf = $this->getUser()->getIdPersonne();
        // Obtention du manager puis des absences d'un professeur
        $absences = $this->getManager()->loadAllAbsences($idProf);

        return $this->render('admin/professeur/absence.html.twig', array("arrayAbsences" => $absences));
    }

   
}