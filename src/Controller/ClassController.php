<?php

namespace App\Controller;

use App\Entity\Lessons;
use App\Entity\Matter;
use App\Form\LessonType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassController extends AbstractController
{
    #[Route('/class/{matter}', name: 'app_pages_class')]
    public function index(Request $request, ManagerRegistry $managerRegistry): Response
    {
        $routeParameters = $request->attributes->get('_route_params');

        if (['matter' => 'redirect'] == $routeParameters) {
            $this->addFlash('warning', 'clique sur una matière espèce de bouffon. comment tu veux quje devine après');

            return $this->redirectToRoute('front_matter');
        } else {
            $matterTitle = $request->get('matter');
            $lesson = new Lessons();

            $form = $this->createForm(LessonType::class, $lesson, ['matterTitle' => $matterTitle]);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $titre = $form['titre']->getData();

                $managerRegistry->getManager()->persist($lesson);
                $managerRegistry->getManager()->flush();

                return $this->redirectToRoute('app_lesson_section', ['lessonSection' => $titre]);
            }

            return $this->render('app/pages/class/index.html.twig', [
                'form' => $form->createView(),
                'lessons' => $managerRegistry->getRepository(Lessons::class)->findBy(['Matter' => $managerRegistry->getRepository(Matter::class)->findOneBy(['Title' => $request->get('matter')])]),
            ]);
        }
    }
}
