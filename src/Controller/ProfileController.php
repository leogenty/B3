<?php

namespace App\Controller;

use App\Entity\Group;
use App\Entity\User;
use App\Repository\GroupRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('app/profile', name: 'app_pages_profile')]
    public function index(ManagerRegistry $managerRegistry): Response
    {
        return $this->render('app/pages/profile/index.html.twig', [
            'groups' => $managerRegistry->getRepository(Group::class)->findAll(),
        ]);
    }
}
