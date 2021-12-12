<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           // IdField::new('id'),
            TextField::new('nom'),
            IntegerField::new('prix'),
            TextEditorField::new('description'),
            AssociationField::new('categorie'),
            AssociationField::new('fournisseurs'),
            DateTimeField::new('created_At'),
            DateTimeField::new('updated_At'),
        ];
    }

/*
    public function updatedTimestamps(): void
{
    $this->setUpdated_At(new \DateTime('now'));    
    if ($this->getCreated_At() === null) {
        $this->setCreatedAt(new \DateTime('now'));
    }
}
*/
    
}
