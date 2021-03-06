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

use AppBundle\Entity\Note;
use AppBundle\Entity\Classe;
use AppBundle\Entity\Absence;
use AppBundle\Manager\NoteManager;
use AppBundle\Form\ProfesseurType;
use AppBundle\Form\NoteType;
use AppBundle\Manager\EleveManager;


class NotesController extends Controller
{
    private function getManager()
    {
        return new NoteManager($this->get('doctrine')->getManager());
    }




    /**
     * @Route("/admin/professeur/add/{idClasse}/{idModule}", name="admin_professeur_addnote")
     * @Route("/admin/professeur/addIndex", name="admin_professeur_addnoteindex")
     */
    public function addAction($idClasse, $idModule)
    {
        // Création d'une nouvelle note
        $note = new Note();

        // Création du modèle du formulaire qui est lié à l'entité d'une note
        $model = $this->get('form.factory')->create(new NoteType(), $note);

        // Obtention de l'objet "request"
        $request = $this->get('request');
        // Si l'utilisateur soumet le formulaire
        if ($request->getMethod() == 'POST')
        {
            // Attachement du modèle à l'objet "request"
            $model->handleRequest($request);
            if ($model->isValid())
            {
                // Obtention du manager
                $manager = $this->getManager();
                // Validation de l'entité
                $manager->saveNote($note);

                // Redirection vers la page de modification d'une note
                return new RedirectResponse($this->generateUrl('admin_professeur_homepage',
                    array('id' => $note->getIdNote())));

            }
        }

        // On n'utilise pas le template par défaut mais le template de l'action 'edit'
        return $this->render('admin/professeur/add.html.twig', array('form' => $model->createView(), 'note' => $note, 'idClasse' => $idClasse, 'idModule' => $idModule));
        return $this->render('admin/professeur/addIndex.html.twig', array('form' => $model->createView(), 'note' => $note));
    }

    /**
     * @Route("/admin/professeur/addIndex", name="admin_professeur_addnoteindex")
     */
    public function addIndexAction()
    {
        // Création d'une nouvelle note
        $note = new Note();

        // Création du modèle du formulaire qui est lié à l'entité d'une note
        $model = $this->get('form.factory')->create(new NoteType(), $note);

        // Obtention de l'objet "request"
        $request = $this->get('request');
        // Si l'utilisateur soumet le formulaire
        if ($request->getMethod() == 'POST')
        {
            // Attachement du modèle à l'objet "request"
            $model->handleRequest($request);
            if ($model->isValid())
            {
                // Obtention du manager
                $manager = $this->getManager();
                // Validation de l'entité
                $manager->saveNote($note);

                // Redirection vers la page de modification d'une note
                return new RedirectResponse($this->generateUrl('admin_professeur_homepage',
                    array('id' => $note->getIdNote())));

            }
        }

        // On n'utilise pas le template par défaut mais le template de l'action 'edit'
       return $this->render('admin/professeur/addIndex.html.twig', array('form' => $model->createView(), 'note' => $note));
    }
    

    /**
     * @Route("/admin/professeur/editNote/{id}/{idClasse}/{idModule}", name="admin_professeur_editnote")
     */
    public function editAction($id, $idClasse, $idModule)
    {

        // Obtention du manager (appel au repository)
        $manager = $this->getManager();
        // Recherche d'une note (charger la note + id)
        if (!$note = $manager->loadNote($id))
        {
            throw new NotFoundHttpException("La note n'existe pas");
        }

        // Création du modèle du formulaire qui est lié à l'entité note
        $model = $this->get('form.factory')->create(new ProfesseurType(), $note);
        // Obtention de l'objet "request"
        $request = $this->get('request');
        // Si l'utilisateur soumet le formulaire
        if ($request->getMethod() == 'POST')
        {
            // Attachement du modèle à l'objet "request"
            $model->handleRequest($request);
            if ($model->isValid())
            {
                // Validation de l'entité
                $manager->saveNote($note);
                //return new RedirectResponse($this->generateUrl('admin_professeur_homepage', array()));
                return new RedirectResponse($this->generateUrl('admin_professeur_listeEleve',
                    array('id' => $note->getIdnote(),'idClasse'=>$idClasse,'idModule' => $idModule)));
            }
        }
        
        return $this->render('admin/professeur/editNote.html.twig', array('form' => $model->createView(), 'note' => $note, 'idClasse' => $idClasse, 'idModule' => $idModule));
    }


    /**
     * @Route("/admin/professeur/delete", name="admin_professeur_deletepage")
     */
    public function deleteAction()
    {
        // Obtention de l'objet "request"
        $request = $this->get('request');
        // Si l'utilisateur soumet le formulaire
        if ($request->getMethod() == 'POST')
        {
            // Récupération de l'ID de la note à supprimer
            $id = $request->request->get('id');

            // Obtention du manager
            $manager = $this->getManager();
            // Recherche du film
            if (!$note = $manager->loadNote($id))
            {
                throw new NotFoundHttpException("La note n'existe pas");
            }

            $message = sprintf("La note num %u a ete supprime", $id);
            $status = 0;
            // Suppression de la note
            try
            {
                $manager->removeNote($note);
            }
            catch (\Exception $e)
            {
                $message = sprintf("L erreur suivante est survenue lors de la suppression de la note num %u : %s",
                    $id, $e->getMessage());
                $status = -1;
            }
        }
        else
        {
            $message = "L'appel à la méthode de suppression est incorrecte";
            $status = $id = -1;
        }


        // Retour du résultat en Json
        $response = new Response(json_encode(array('status' => $status, 'message' => $message, 'id' => $id)));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    /**

     * @Route("/admin/professeur/listeEleve", name="admin_professeur_listeEleve")
     */
    public function listeNote(){
        // Obtention du manager puis des classes
        $listenote = $this->getManager()->loadAllNotes();
        $listeleve = $this->getManager()->loadAllNotesEleves();

        return $this->render('admin/professeur/listeleve.html.twig', array("arrayNotes" => $listenote,"arrayEleves"=> $listeleve));
    }
    
}