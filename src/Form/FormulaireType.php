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
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],
              
            )
            ->add('nom_usage', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('prenom', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('date_naissance', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('portable', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('fixe', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('email', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('adresse', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('detail', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('cp', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('ville', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('pays', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('nationalite', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('dept', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('ville_naissance', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('pole', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('intitule', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('certif', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('date_debut', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('date_fin', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('diplome', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('qualif', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('date_obtention', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('exp', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('metier', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('duree', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('entreprise', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('remu', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('salarie', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('statut', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('commentaire', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('statut_salarie', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('entreprise_tuteur', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('adresse_entreprise', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('ville_entreprise', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('cp_entreprise', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('nom_tuteur', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('prenom_tuteur', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('mail_tuteur', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
                ->add('telephone_tuteur', TextType::class, [
                        'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'border: none; border-radius: 5px;',  ],
                  
                        
                    
                ])



        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
