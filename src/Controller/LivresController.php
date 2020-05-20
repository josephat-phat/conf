<?php

namespace App\Controller;


use App\Repository\LivreRepository;
use App\Form\CreerCompteMailType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LivresController extends AbstractController
{
    /**
     * @Route("/livres", name="livres")
     */
    public function getAllLivre(LivreRepository $livre, Request $request,\Swift_Mailer $mailer)
    {
        $form = $this->createForm(CreerCompteMailType::class);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $mail = $form->getData();
            $message = (new \Swift_Message('Creation compte'))
                ->setFrom($mail['email'])
                ->setTo('jloussamboulou@gmail.com')
                ->setBody(
                    $this->renderView(
                        'livre/livres.html.twig',[
                            'form' =>$form->createView(),
                            'livres' => $livre->findAll(),
                            compact('mail'),
                        ]
                        
                    ),
                    'text/html'
                )
                ;
                dd($mail);
                $mailer->send($message);
                return $this->redirectToRoute('livres', [
                    'form' =>$form->createView(),
                    'livres' => $livre->findAll(),
                ]);
        }
        $erreur ="";
        return $this->render('livre/livres.html.twig', [
            'form' =>$form->createView(),
            'livres' => $livre->findAll(),
            'err' => $erreur
        ]);
    }
}
