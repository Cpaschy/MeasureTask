<?php

namespace AppBundle\Controller;

use AppBundle\Entity\GestionTache;
use AppBundle\Form\GestionTacheType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

class DefaultController extends Controller
{

    private $tokenManager;

    public function __construct(CsrfTokenManagerInterface $tokenManager = null)
    {
        $this->tokenManager = $tokenManager;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function loginAction(Request $request)
    {
        $authChecker = $this->container->get('security.authorization_checker');
        $router = $this->container->get('router');
        $csrfToken = $this->tokenManager ? $this->tokenManager->getToken('authenticate')->getValue() : null;

        if ($authChecker->isGranted('ROLE_ADMIN')) {
            return new RedirectResponse($router->generate('suiviTache'), 307);
        }

        if ($authChecker->isGranted('ROLE_ADMINISTRATIF')) {
            return new RedirectResponse($router->generate('homeAdmin'), 307);
        }

        if ($authChecker->isGranted('ROLE_PILOTE')) {
            return new RedirectResponse($router->generate('homePilote'), 307);
        }

        if ($authChecker->isGranted('ROLE_ALG')) {
            return new RedirectResponse($router->generate('homeAlg'), 307);
        }


        // Le service authentication_utils permet de récupérer le nom d'utilisateur
        // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
        // (mauvais mot de passe par exemple)
        $authenticationUtils = $this->get('security.authentication_utils');

        return $this->render('AppBundle:Security:login.html.twig', array(
            'last_username' => $authenticationUtils->getLastUsername(),
            'error'         => $authenticationUtils->getLastAuthenticationError(),
            'csrf_token' => $csrfToken
        ));

    }
    public function indexAction()
    {
        return $this->render('@pages/default/index.html.twig');
    }

    /**
     * @Security("has_role('ROLE_ADMINISTRATIF')")
     */
    public function adminAction(Request $request)
    {
        $gestionTache = new GestionTache();
        $current_user = $this->getUser();
        $form = $this->createForm(GestionTacheType::class,$gestionTache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $gestionTache = $form->getData();
            $gestionTache->setDate(new \DateTime(null, new \DateTimeZone('Europe/Paris')));
            $gestionTache->setUser($current_user);
            $em->persist($gestionTache);
            $em->flush();

            return $this->redirectToRoute('homeAdmin');
        }

        return $this->render('@pages/full/homeAdmin.html.twig',
            array('form'=>$form->createView()));
    }

    /**
     * @Security("has_role('ROLE_ALG')")
     */
    public function algAction(Request $request)
    {
        $gestionTache = new GestionTache();
        $current_user = $this->getUser();
        $form = $this->createForm(GestionTacheType::class,$gestionTache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $gestionTache = $form->getData();
            $gestionTache->setDate(new \DateTime(null, new \DateTimeZone('Europe/Paris')));
            $gestionTache->setUser($current_user);
//            dump($gestionTache);
//            die();
            $em->persist($gestionTache);
            $em->flush();

            return $this->redirectToRoute('homeAlg');
        }

        return $this->render('@pages/full/homeAlg.html.twig',
            array('form'=>$form->createView()));
    }

    /**
     * @Security("has_role('ROLE_PILOTE')")
     */
    public function piloteAction(Request $request)
    {
        $gestionTache = new GestionTache();
        $current_user = $this->getUser();
        $form = $this->createForm(GestionTacheType::class,$gestionTache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $gestionTache = $form->getData();
            $gestionTache->setDate(new \DateTime(null, new \DateTimeZone('Europe/Paris')));
            $gestionTache->setUser($current_user);
            $em->persist($gestionTache);
            $em->flush();

            return $this->redirectToRoute('homePilote');
        }

        return $this->render('@pages/full/homePilote.html.twig',
            array('form'=>$form->createView()));
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function suiviAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $taches = $this->getDoctrine()->getManager()->getRepository('AppBundle:GestionTache')->findAllTaches();

        return $this->render('@pages/full/suiviAdmin.html.twig',
            array('taches'=>$taches));

    }

}
