<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $route = $this->generateUrl("login");

        if($this->get("security.context")->isGranted('ROLE_ELEVE')) {
            $route = $this->generateUrl("admin_eleve_homepage");
        } elseif ($this->get("security.context")->isGranted('ROLE_PROFESSEUR')) {
            $route = $this->generateUrl("admin_professeur_homepage");
        }

        // replace this example code with whatever you need
        return $this->redirect($route);
    }
}
