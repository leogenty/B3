<?php

namespace App\Controller;

use App\Entity\Lessons;
use App\Entity\LessonSection;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'front_home')]
    public function index(): Response
    {
        return $this->render('front/pages/home/index.html.twig');
    }
}
