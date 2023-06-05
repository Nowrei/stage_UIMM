<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\DBAL\Types\ArrayType;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            'email',
            'token',
            'isVerified',
            BooleanField::new('isAdmin'),
            //'roles[0]',
            //FormField::addPanel('User Details'),
            'nomApprenant',
            'prenomApprenant',
            'dateNaissance',
            'tel1Appr',
            'adresse1Appr',
            'adresse2Appr',
            'cpAppr',
            'villeAppr',
            'idPays',
            'idNationalite',
            'paysNaissance',
            'departementNaissance',

            //FormField::addPanel(),
            'idFormationSouhait1',
            'dernierDiplome',
            'niveauQualification',
            
            DateTimeField::new('dateObtention')->setFormat('yyyy-mm-dd'),
            'dejaExperience',
            'dernierMetier',
            'dureeExperience',
            'entrepriseExperience',
            'niveauRemuneration',
            'salarie',
            'statut',
            'statutSalarie',
            'statutCommentaire',
            'entrepriseSalarie',
            'adresseEntreprise',
            'villeEntreprise',
            'cpEntreprise',
            'nomTuteur',
            'prenomTuteur',
            'adresseMaillTuteur',
            'telephoneTuteur',
            
        ];
    }

    /*
    public function configureFields(string $pageName): iterable
{
    return [
        TextField::new('title'),
        TextEditorField::new('description'),
        MoneyField::new('price')->setCurrency('EUR'),
        IntegerField::new('stock'),
        DateTimeField::new('publishedAt'),

        yield DateTimeField::new('...')->setFormat('yyyy.MM.dd G 'at' HH:mm:ss zzz');
        yield DateTimeField::new('...')->setFormat('yyyyy.MMMM.dd GGG hh:mm aaa');
    ];
}
    */
    
}
