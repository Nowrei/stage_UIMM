<?php

namespace App\Controller\Admin;

use App\Entity\Formations;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FormationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formations::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            AssociationField::new('user')
                ->formatValue(function ($value, $entity) {
                    $civilite = ($entity->getUser()->getCodeCiviliteApprenant() == 1) ? 'M.' : 'Mme.';
                    $prenom = ($entity->getUser()->getPrenomApprenant());
                    $nom = ($entity->getUser()->getNomApprenant());
                    return $civilite . ' ' . $nom . ' ' . $prenom;
                }),
            AssociationField::new('poleFormation')
                ->formatValue(function ($value, $entity) {
                    return $entity->getPoleFormation()->getNom();
                }),
            TextField::new('intituleFormation')->setLabel('Nom de la formation'),
            TextField::new('typeCertFormation'),
            DateField::new('dateDebutFormation')->setFormat('dd-MM-yyyy'),
            DateField::new('dateFinFormation')->setFormat('dd-MM-yyyy'),
        ];
    }
    
}
