<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FormulaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->setRequired(false);
        $builder
        ->add('civilite', ChoiceType::class, [
            'label' => false,
            'required' => true,
            'choices' => [
                'Séléctioné votre civilité dans la liste' => '',
                'Monsieur' => '1',
                'Madame' => '2',

            ],
            'attr' => [
                'class' => 'appearance-none w-full py-1 px-2 w-10 bg-white rounded-lg',
            ],
        ])
            ->add('nom', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],
              
            )
            ->add('nom_usage', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('prenom', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('portable', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('fixe', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('email', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('adresse', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('detail', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('cp', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('ville', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('pays', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('nationalite', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('dept', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('ville_naissance', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('pole', ChoiceType::class, [
                'label' => false,
                'required' => true,
                'choices' => [
                    'Pole formation Champagne-Ardenne' => '',
                    'Marne' => 'Marne',
                    'Ardennes' => 'Ardennes',
                    'Aube' => 'Aube',
                    'Haute-Marne' => 'Haute-Marne',
                ],
                'attr' => [
                    'class' => 'appearance-none  py-1 px-2 w-30 bg-white rounded-lg',
                ],  ],)
            ->add('intitule', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('certif', ChoiceType::class, [
                'label' => false,
                'required' => true,
                'choices' => [
                    'Type de certification' => '',
                    'CQPM' => 'CQPM',
                    'Bloc de compétence' => 'Bloc de compétences',
                    'CCPM' => 'CCPM',
                    'CCPI' => 'CCPI',
                    'Autre' => 'Autre',
                    
    
                ],
                'attr' => [
                    'class' => 'appearance-none  py-1 px-2 bg-white rounded-lg',
                ],
            ])
            ->add('diplome', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('qualif', ChoiceType::class, [
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
            ->add('date_obtention', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            
            ->add('metier', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('duree', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('entreprise', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('remu', ChoiceType::class, [
                'label' => false,
                'required' => true,
                'choices' => [
                    'Niveau de rémunération' => '',
                    'Ne souhaite pas répondre' => 'Ne souhaite pas répondre',
                    'Aucune' => 'Aucune',
                    'Hors métalurgie' => 'Hors métalurgie',
                    'Inférieur au coef 170' => 'Inférieur au coef 170',
                    'Entre coef 170 et 215' => 'Entre coef 170 et 215',
                    'Entre coef 215 et 255' => 'Entre coef 215 et 255',
                    'Entre coef 255 et 285' => 'Entre coef 255 et 285',
                    'Supérieur au coef 285' => 'Supérieur au coef 285',
                    
    
                ],
                'attr' => [
                    'class' => 'appearance-none  py-1 px-2 bg-white rounded-lg',
                ],  ],)
            
            ->add('statut', ChoiceType::class, [
                'label' => false,
                'required' => true,
                'choices' => [
                    'Statut' => '',
                    'CPF' => 'CPF',
                    'Financement Région' => 'Financement Région',
                    'POE Individuelle' => 'POE Individuelle',
                    'POE COllective' => 'POE Collective',
                    'VAR' => 'VAE',
                    'Autre' => 'Autre',

                    
    
                ],
                'attr' => [
                    'class' => 'appearance-none  py-1 px-2 bg-white rounded-lg',
                ],  ],)
            ->add('commentaire', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('statut_salarie', ChoiceType::class, [
                'label' => false,
                'required' => true,
                'choices' => [
                    'Statut salarié' => '',
                    'Contrat de professionnalisation' => 'Contrat de professionnalisation',
                    'Contrat de professionnalisation expérimental' => 'Contrat de professionnalisation expérimental',
                    'Contrat d\'apprentissage' => 'Contrat d\'apprentissage',
                    'Contrat pro intérimaire' => 'Contrat pro intérimaire',
                    'Plan de développement des Compétences' => 'Plan de développement des Compétences',
                    'CPF' => 'CPF',
                    'CPF Transition professionnelle' => 'CPF Transition professionnelle',
                    'Pro A' => 'Pro A',
                    'VAE' => 'VAE',
                    'Autre' => 'Autre'
                ],
                'attr' => [
                    'class' => 'appearance-none  py-1 px-2 bg-white rounded-lg',
                ],  ],)
            ->add('entreprise_tuteur', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('adresse_entreprise', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('ville_entreprise', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('cp_entreprise', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('nom_tuteur', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('prenom_tuteur', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('mail_tuteur', TextType::class, [
                    'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
                    'style' => 'border: none; border-radius: 5px;',  ],  ],)
                ->add('telephone_tuteur', TextType::class, [
                        'label' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2',
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
