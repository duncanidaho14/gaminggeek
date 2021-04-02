<?php

namespace App\Controller\Admin;

use App\Entity\Plateforme;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlateformeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Plateforme::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
