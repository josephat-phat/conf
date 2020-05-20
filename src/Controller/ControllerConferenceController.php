<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Conference;
use App\Form\CommentaireFormType;
use App\Repository\CommentaireRepository;
use App\Repository\ConferenceRepository;
use App\SpamChecker;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ControllerConferenceController extends AbstractController
{
    /**
     * @Route("/conference", name="conference")
     */
    public function conference(ConferenceRepository $repo){
        $erreur ="";
        return $this->render('conference/conference.html.twig',[
            'conferences'=>$repo->findAll(),
            'err' => $erreur
        ]);
    }




    /**
     * 
     * 
     * @Route("/conference/{slug}", name="detail_conference")
     */
    public function detail(conference $conference){
        $erreur ="";
        return $this->render('conference/detail_conference.html.twig',[
            'conference'=> $conference,
            'err' => $erreur
        ]);
    }
}
