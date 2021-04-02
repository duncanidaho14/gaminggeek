<?php

namespace App\Controller\Admin;

use App\Entity\Jeuxvideo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class JeuxvideoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Jeuxvideo::class;
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
