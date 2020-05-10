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
        if($form->isSubmitted() && $form->isValid()){
            $mail = $form->getData();
            $message = (new \Swift_Message('Creation compte'))
                ->setFrom($mail["email"])
                ->setTo('josephlouss@gmail.com')
                ->setBody(
                    $this->renderView(
                        'livre/livres.html.twig',[
                            'form' =>$form->createView(),
                            'livres' => $livre->findAll(),
                        ],compact('$mail')
                    ),
                    'text/html'
                )
                ;
                $mailer->send($message);
                return $this->redirectToRoute('livre/livres.html.twig', [
                    'form' =>$form->createView(),
                    'livres' => $livre->findAll(),
                ]);
        }

        return $this->render('livre/livres.html.twig', [
            'form' =>$form->createView(),
            'livres' => $livre->findAll(),
        ]);
    }
}
