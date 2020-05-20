<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;

// Class  Controller acceuil qui permet l'entrée dans le site
class Controller_accueil extends AbstractController {
    /**
     * 
     * 
     * @Route("/", name="accueil")
     */
    public function accueil(){
        $erreur ="";
        return $this->render("accueil.html.twig",[
            'err' => $erreur
        ]);
    }
}
?>