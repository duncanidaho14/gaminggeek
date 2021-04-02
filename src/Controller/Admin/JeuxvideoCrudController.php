<?php

namespace App\Controller\Admin;

use App\Entity\Jeuxvideo;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class JeuxvideoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Jeuxvideo::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('name'),
            DateField::new('releaseDate'),
            MoneyField::new('price')->setCurrency('EUR'),
            TextField::new('introduction'),
            TextEditorField::new('description'),
            ImageField::new('coverImage'),
            AssociationField::new('user'),
            CollectionField::new('categories'),
        ];
    }
    
}
