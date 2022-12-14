<?php

namespace App\Controller;

use App\Entity\Group;
use App\Form\GroupeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroupeCreatorController extends AbstractController
{

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/admin/groupe/creator', name: 'app_groupe_creator')]
    public function index(Request $request): Response
    {


        $group = new Group();
        $form = $this->createForm(GroupeType::class, $group);

        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid())
        {
            $group = $form->getData();


            $this->entityManager->persist($group);
            $this->entityManager->flush();

            return $this->redirectToRoute('front_home');
        }

        return $this->render('groupe_creator/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
