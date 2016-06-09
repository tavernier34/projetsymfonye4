<?php

namespace AppBundle\Security;

use AppBundle\Entity\Personne;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\AuthenticationEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGenerator;

class loginListener implements EventSubscriberInterface
{

    protected $security;
    protected $session;
    protected $manager;
    protected $router;

    /**
     * Constructs a new instance of SecurityListener.
     *
     * @param SecurityContext $security The security context
     * @param Session $session The session
     * @param EntityManager $manager
     * @param UrlGeneratorInterface $routeur
     */
    public function __construct(SecurityContext $security, Session $session,EntityManager $manager, UrlGeneratorInterface $router)
    {
        //You can bring whatever you need here, but for a start this should be useful to you
        $this->security = $security;
        $this->session = $session;
        $this->manager = $manager;
        $this->routeur = $router;
    }

    public static function getSubscribedEvents()
    {
        return array(
            AuthenticationEvents::AUTHENTICATION_FAILURE => 'onAuthenticationFailure',
            AuthenticationEvents::AUTHENTICATION_SUCCESS => 'onAuthenticationSuccess',
        );
    }

    public function onAuthenticationSuccess( InteractiveLoginEvent $event )
    {
        $token = $this->security->getToken();
        $username = $token->getUser()->getUsername();
        $user = $token->getUser();

        $roleEleve = $this->manager->createQuery('select IDENTITY (e.idEleve) from AppBundle:Eleve e where e.email = :email')
            ->setParameter('email', $username)
            ->getResult();

	    $roleProf = $this->manager->createQuery('select IDENTITY (p.idProfesseur) from AppBundle:Professeur p where p.email = :email')
            ->setParameter('email', $username)
            ->getResult();

        if($roleEleve != null && $roleEleve != '') {
            //$role=$role[0];
            $token = new UsernamePasswordToken(
                $user,
                null,
                'main',
                array('ROLE_ELEVE')
            );
        } elseif ($roleProf != null && $roleProf != '') {
		    $token = new UsernamePasswordToken(
                $user,
                null,
                'main',
                array('ROLE_PROFESSEUR')
            );
	    }
	    $this->security->setToken($token);
    }

    public function onAuthenticationFailure( InteractiveLoginEvent $event )
    {

    }

}
