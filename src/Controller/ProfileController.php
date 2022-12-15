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

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('app/profile', name: 'app_pages_profile')]
    public function index(ManagerRegistry $managerRegistry): Response
    {

        var_dump($managerRegistry->getRepository(User::class)->findOneBy(['id'=>$this->getUser()->getId()]));
        var_dump($this->getUser()->getId());
        var_dump($managerRegistry->getRepository(Group::class)->findOneBy(['user'=>$managerRegistry->getRepository(User::class)->findOneBy(['id'=>$this->getUser()->getId()])]));

        return $this->render('app/pages/profile/index.html.twig',
        [
            'group' => $managerRegistry->getRepository(Group::class)->findBy(['user'=>$managerRegistry->getRepository(User::class)->findOneBy(['id'=>$this->getUser()->getId()])])
        ]);
    }
}
