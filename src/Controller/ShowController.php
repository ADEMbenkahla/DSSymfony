<?php

namespace App\Controller;

use App\Entity\Show;
use App\Form\ShowType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ShowController extends AbstractController
{
    #[Route('/show', name: 'app_show')]
    public function index(): Response
    {
        return $this->render('show/index.html.twig', [
            'controller_name' => 'ShowController',
        ]);
    }
    #[Route('/addshow', name: 'addshow')]
    public function addtheatre(Request $request, ManagerRegistry $doctrine): Response
    {
        $show = new Show();
        $show->setNbrsrat(30); // Initialisation du nombre de places à 30
        $form = $this->createForm(ShowType::class, $show, [
            'submit_label' => 'Ajouter',
        ]);
        
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            
            $em->persist($show);
            $em->flush();
            
            
            $this->addFlash('success', 'show ajouté avec succès !');
            
            return $this->redirectToRoute('addshow'); 
        }
        
        return $this->render("theatre_play/add.html.twig", [
            'adem' => $form->createView(),
        ]);
    }
}
