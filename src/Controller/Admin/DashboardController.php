<?php

namespace App\Controller\Admin;

use App\Entity\Group;
use App\Entity\Lessons;
use App\Entity\LessonSection;
use App\Entity\Matter;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MyLearning')
            ->setLocales(['fr']);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Matter', 'fas fa-list', Matter::class);
        yield MenuItem::linkToCrud('Lessons', 'fas fa-list', Lessons::class);
        yield MenuItem::linkToCrud('Group', 'fas fa-list', Group::class);
        yield MenuItem::linkToCrud('Lessonsection', 'fas fa-list', LessonSection::class);
    }
}
