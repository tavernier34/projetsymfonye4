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
}