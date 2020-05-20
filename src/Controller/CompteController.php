<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class CompteController extends AbstractController
{
    /**
     * @Route("/menu", name="compte_menu")
     * 
     * @return Response
     */
    public function menu(AuthenticationUtils $utils){
        $erreur = $utils->getLastAuthenticationError();
        return $this->render('accueil.html.twig',[
            'err' => $erreur !== null
        ]);
    } 

    /**
     * 
     * @Route("/logout", name="compte_logout")
     * 
     * @return void
     */
    public function logout(){
        //.. rien
    }
}
