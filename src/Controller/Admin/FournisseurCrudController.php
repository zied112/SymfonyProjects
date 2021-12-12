<?php

namespace App\Controller\Admin;

use App\Entity\Fournisseur;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FournisseurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fournisseur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('nom'),
            TextareaField::new ('adresse'),
            TelephoneField::new ('telephone'),
            EmailField::new('email'),
            
        ];
    }

}
