<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('token')
            ->add('isVerified')
            ->add('codeCiviliteApprenant')
            ->add('nomApprenant')
            ->add('nomJf')
            ->add('prenomApprenant')
            ->add('dateNaissance')
            ->add('tel1Appr')
            ->add('tel2Appr')
            ->add('emailAppr')
            ->add('adresse1Appr')
            ->add('adresse2Appr')
            ->add('cpAppr')
            ->add('villeAppr')
            ->add('lieuNaissance')
            ->add('idPays')
            ->add('paysNaissance')
            ->add('idNationalite')
            ->add('departementNaissance')
            ->add('idFormationSouhait1')
            ->add('dernierDiplome')
            ->add('niveauQualification', ChoiceType::class, [
                'label' => false,
                'required' => true,
                'choices' => [
                    'Niveau de qualification' => '',
                    'Niv 1' => 'Niv 1',
                    'Niv 2 (CFG DNB)' => 'Niv 2 (CFG DNB)',
                    'Niv 3 (CAP)' => 'Niv 3 (CAP)',
                    'Niv 4 (Bac)' => 'Niv 4 (Bac)',
                    'Niv 5 (BAC +2 BTS DUT)' => 'Niv 5 (BAC +2 BTS DUT)',
                    'Niv 6 (BAC +3)' => 'Niv 6 (BAC +3)',
                    'Niv 7 (Bac +5)' => 'Niv 7 (Bac +5)',
                    'Niv 8 (Bac +8)' => 'Niv 8 (Bac +8)',
                    
    
                ],
                'attr' => [
                    'class' => 'appearance-none  py-1 px-2 bg-white rounded-lg',
                ], ],)
            ->add('dateObtention')
            ->add('dejaExperience')
            ->add('dernierMetier')
            ->add('dureeExperience')
            ->add('entrepriseExperience')
            ->add('niveauRemuneration')
            ->add('salarie')
            ->add('statut')
            ->add('statutSalarie')
            ->add('statutCommentaire')
            ->add('entrepriseSalarie')
            ->add('adresseEntreprise')
            ->add('villeEntreprise')
            ->add('cpEntreprise')
            ->add('nomTuteur')
            ->add('prenomTuteur')
            ->add('adresseMaillTuteur')
            ->add('telephoneTuteur')
            ->add('user_form')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
