<?php

namespace WorkShop\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response as Response;

class loginHandlerController extends Controller
{

    /**
    * @Route("/", name="workshop_application_login")
    */
    public function loginAction(Request $request)
    {
        if ( $this->isGranted('ROLE_USER') ) {
            return $this->redirectToRoute('workshop_application_admin_index');       
        } else {
            return $this->render('WorkShopApplicationBundle:loginHandler:login.html.twig');
        }
    }
    
    
    /**
    * @Route("/logout", name="workshop_application_logout")
    */
    public function logoutAction(Request $request)
    {
        return new Response('wylogowałeś się');
    }
    

    /**
     * @Route(
     *      "/secured_area",
     *      name="secured_area"
     * )
     */
    public function securedAction()
    {
        return new Response('<html><head></head><body>You\'re in secured area!</body></html>');
    }
    
}
