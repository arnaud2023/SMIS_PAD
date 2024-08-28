<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Users;
use App\Entity\Equipement;
use App\Entity\Intervention;
use App\Entity\Technicien;
use App\Entity\Utilisateur;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // // Option 1. You can make your dashboard redirect to some common page of your backend
        // //
        // // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // // Option 2. You can make your dashboard redirect to different pages depending on the user
        // //
        // // if ('jane' === $this->getUser()->getUsername()) {
        // //     return $this->redirect('...');
        // // }

        // // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        // //
         return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MonApp');
            
    }
    

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield  MenuItem::linkToCrud('Users', 'fa fa-users', Users::class);
        yield  MenuItem::linkToCrud('Equipement', 'fa fa-window-maximize', Equipement::class);
        yield  MenuItem::linkToCrud('Intervention', 'fa fa-cog', Intervention::class);
        yield  MenuItem::linkToCrud('Technicien', 'fa fa-cog', Technicien::class);
        yield  MenuItem::linkToCrud('Utilisateur', 'fa fa-person', Utilisateur::class);

         
    }
}
