<?php

namespace App\Controller\Admin;

use App\Entity\SiteFormation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SiteFormationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SiteFormation::class;
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
