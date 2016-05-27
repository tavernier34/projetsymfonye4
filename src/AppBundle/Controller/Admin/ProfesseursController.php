<?php

/**
 * Created by PhpStorm.
 * User: Jérôme
 * Date: 27/05/2016
 * Time: 09:14
 */

namespace AppBundle\Controller\Admin;


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
     * @Route("/admin/professeur", name="admin_professeur_homepage")
     */
    
    public function indexAction()
    {
    // Obtention du manager puis des classes
        $classes = $this->getManager()->loadAllClasses();

        return $this->render('admin/professeur/index.html.twig', array("arrayClasses" => $classes));
    }
    
    
}