<?php

namespace App\Controller;

use App\Entity\Lessons;
use App\Entity\Matter;
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
            return $this->render('app/pages/class/index.html.twig', [
                'lessons' => $managerRegistry->getRepository(Lessons::class)->findBy(['Matter' => $managerRegistry->getRepository(Matter::class)->findOneBy(['Title' => $request->get('matter')])]),
            ]);
        }
    }
}
