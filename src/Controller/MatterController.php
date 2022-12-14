<?php

namespace App\Controller;

use App\Repository\MatterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MatterController extends AbstractController
{
    #[Route('/matter', name: 'front_matter')]
    public function index(MatterRepository $matterRepository): Response
    {
        return $this->render('front/pages/matter/index.html.twig', [
            'matters' => $matterRepository->findAll()
        ]);
    }
}
