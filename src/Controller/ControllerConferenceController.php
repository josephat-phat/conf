<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ControllerConferenceController extends AbstractController
{
    /**
     * @Route("/conference", name="conference")
     */
    public function conference(){
        return $this->render('conference/conference.html.twig');
    }




    /**
     * 
     * 
     * @Route("/conference/detail_conference", name="detail_conference")
     */
    public function detail(){
        return $this->render("conference/detail_conference.html.twig");
    }
}
