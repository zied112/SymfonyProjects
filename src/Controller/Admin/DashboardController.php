<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use App\Entity\Categorie;
use App\Entity\Fournisseur;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\ProduitCrudController;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Contracts\Translation\TranslatorInterface;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/{_locale}/admin", name="admin",)
     */

    /*requirements={"_locale": "en|fr|ar" }*/

    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        return $this->redirect($routeBuilder->setController(ProduitCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('iStock');
    }

    public function configureMenuItems(): iterable
    {        
        #yield MenuItem::linktoDashboard('iStock', 'fa fa-home');
        yield MenuItem::linkToCrud('Manage category', 'fas fa-list', Categorie::class);
        yield MenuItem::linkToCrud('Manage product', 'fas fa-list', Produit::class);
        yield MenuItem::linkToCrud('Manage provider', 'fas fa-list', Fournisseur::class);

    }
}
