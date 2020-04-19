<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// Class  Controller acceuil qui permet l'entrée dans le site
class Controller_accueil extends AbstractController {
    /**
     * 
     * 
     * @Route("/", name="accueil")
     */
    public function accueil(){
        return $this->render("accueil.html.twig");
    }
}
?>