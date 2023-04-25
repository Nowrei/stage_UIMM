<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FormulaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom'
                
            ],
            EntityType::class, [
                'class' => ''
            ])
            ->add('nom_usage')
            ->add('prenom')
            ->add('date_naissance')
            ->add('portable')
            ->add('fixe')
            ->add('email')
            ->add('adresse')
            ->add('detail')
            ->add('cp')
            ->add('ville')
            ->add('pays')
            ->add('nationalite')
            ->add('dept')
            ->add('ville_naissance')
            ->add('pole')
            ->add('intitule')
            ->add('certif')
            ->add('date_debut')
            ->add('date_fin')
            ->add('diplome')
            ->add('qualif')
            ->add('date_obtention')
            ->add('exp')
            ->add('metier')
            ->add('duree')
            ->add('entreprise')
            ->add('remu')
            ->add('salarie')
            ->add('statut')
            ->add('commentaire')
            ->add('statut_salarie')
            ->add('entreprise_tuteur')
            ->add('adresse_entreprise')
            ->add('ville_entreprise')
            ->add('cp_entreprise')
            ->add('nom_tuteur')
            ->add('prenom_tuteur')
            ->add('mail_tuteur')
            ->add('telephone_tuteur')



        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
