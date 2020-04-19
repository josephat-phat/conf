<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="speaker")
     */
    public function speaker(){
        return $this->render('user/speaker.html.twig');
    }


    /**
     * 
     * 
     * @Route("/user/detail_speaker", name="speaker_detail")
     */
    public function speaker_detail(){
        return $this->render("user/speaker_detail.html.twig");
    }

}