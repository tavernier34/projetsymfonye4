<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 6/4/16
 * Time: 10:06 AM
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        return $this->render(
            'Layout/layout.html.twig',
            array(
                // last username entered by the user
                'error'         => $error,
            )
        );
    }

}