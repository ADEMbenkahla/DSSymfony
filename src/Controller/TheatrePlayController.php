<?php

namespace App\Controller;

use App\Entity\TheatrePlay;
use App\Form\TheatrePlayType;
use App\Repository\TheatrePlayRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TheatrePlayController extends AbstractController
{
    #[Route('/theatre/play', name: 'app_theatre_play')]
    public function index(): Response
    {
        return $this->render('theatre_play/index.html.twig', [
            'controller_name' => 'TheatrePlayController',
        ]);
    }
    #[Route('/addTheatreP', name: 'app_TheatreP_add')]
    public function addtheatre(Request $request, ManagerRegistry $doctrine): Response
    {
        $theatre = new TheatrePlay();
        
        $form = $this->createForm(TheatrePlayType::class, $theatre, [
            'submit_label' => 'Ajouter',
        ]);
        
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            
            $em->persist($theatre);
            $em->flush();
            
            
            $this->addFlash('success', 'theatreplay ajouté avec succès !');
            
            return $this->redirectToRoute('app_TheatreP_add'); 
        }
        
        return $this->render("theatre_play/add.html.twig", [
            'adem' => $form->createView(),
        ]);
    }
    #[Route('/displayplay', name: 'app_displayplay')]
    public function DisplayPlay(TheatrePlayRepository $repo): Response
    {
        $theatre=$repo->findAll();
        return $this->render('theatre_play/list.html.twig', [
            'list' => $theatre,
        ]);
    }
    /*#[Route('/update/{id}', name: 'app_theatreP_update')]
    public function updatetheatreplay($id, TheatrePlayRepository $repo, Request $request, ManagerRegistry $doctrine): Response
    {
        $theatre = $repo->find($id);
        $form = $this->createForm(TheatrePlayType::class, $theatre, [
            'submit_label' => 'Modifier', // Spécifier le libellé pour le bouton "Modifier"
        ]);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() ) {
            $em = $doctrine->getManager();
            $em->flush();
            
            // Ajouter un message flash de succès
            $this->addFlash('success', 'theatre mis à jour avec succès !');
            
            return $this->redirectToRoute('app_theatreP_update', ['id' => $theatre->getId()]);
        }
        
        return $this->render("theatre_play/add.html.twig", [
            'adem' => $form->createView(),
        ]);
    }*/
    #[Route('/update/{id}', name: 'update_theatre_play')]
public function UpdateTheatrePlay(
    $id, 
    ManagerRegistry $managerRegistry, 
    TheatrePlayRepository $theatrePlayRepository, 
    Request $req
) {
    $em = $managerRegistry->getManager(); // Récupération du gestionnaire d'entité
    $play = $theatrePlayRepository->find($id); // Recherche de l'entité TheatrePlay par ID
    
    // Création du formulaire lié à l'entité TheatrePlay
    $form = $this->createForm(TheatrePlayType::class, $play); 
    
    $form->handleRequest($req); // Gestion de la requête du formulaire
    
    if ($form->isSubmitted() && $form->isValid()) { // Vérification de la soumission et de la validité
        $em->persist($play); // Persist l'entité modifiée
        $em->flush(); // Enregistrement des modifications dans la base de données

        return $this->redirectToRoute('app_theatreP_update', ['id' => $play->getId()]); // Redirection après mise à jour
    }

    return $this->render('theatre_play/add.html.twig', [
        'adem' => $form->createView(), // Passage de la vue du formulaire au template
    ]);
}
#[Route('/Delete/{id}', name: 'Delete')]
public function Delete($id, ManagerRegistry $managerRegistry,
TheatrePlayRepository $theatrePlayRepository): Response
 { $em = $managerRegistry->getManager();
 $play = $theatrePlayRepository->find($id);
 $em->remove($play);
 $em->flush();
return $this->redirectToRoute('app_displayplay');
}
}
