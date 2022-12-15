<?php

namespace App\Controller;

use App\Entity\Lessons;
use App\Entity\LessonSection;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LessonSectionController extends AbstractController
{
    #[Route('/lesson/{lessonSection}', name: 'app_lesson_section')]
    public function index(Request $request, ManagerRegistry $managerRegistry): Response
    {
        $routeParameters = $request->attributes->get('_route_params');


        return $this->render('front/pages/lesson_section/index.html.twig', [
            'lessonSection' => $managerRegistry->getRepository(LessonSection::class)->findBy(['LessonSection' => $managerRegistry->getRepository(Lessons::class)->findOneBy(['Titre'=>$request->get('lessonSection')])]),
        ]);
    }
}
