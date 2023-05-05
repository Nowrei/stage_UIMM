<?php

namespace App\Form;

use App\Entity\User;

use App\Form\PoleFormationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {  $builder->setRequired(false);
        $builder

            //coordonnées
            ->add('codeCiviliteApprenant', ChoiceType::class, [
                'label' => false,
                'required' => true,
                'choices' => [
                    'Séléctioné votre civilité dans la liste' => '',
                    'Monsieur' => '1',
                    'Madame' => '2',
    
                ],
                'attr' => [
                    'class' => 'appearance-none w-250 py-1 px-2 w-10 bg-white rounded-lg',
                ],
            ])
            ->add('nomApprenant', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],
          
        )
        ->add('nomJf',TextType::class, [
            'label' => false,
        'attr' => [
            'class' => 'form-control py-1 px-2',
            'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('prenomApprenant', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('dateNaissance', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('tel1Appr', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('tel2Appr', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('emailAppr', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('adresse1Appr', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('adresse2Appr', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('cpAppr', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',
                'maxlength' => 5, // Limite maximale de 5 caractères  
            ],  
            'constraints' => [
                new Length([
                    'min' => 5, // Limite minimale de 5 caractères
                    'minMessage' => 'Le champ doit contenir au moins {{ limit }} caractères',
                ]),
            ],
        ],)
            ->add('villeAppr', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('lieuNaissance', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('idPays', HiddenType::class,)
            ->add('paysNaissance', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('idNationalite', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('departementNaissance', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            //formation
            ->add('idFormationSouhait1')
            ->add('poleFormation', PoleFormationType::class)

            ->add('dernierDiplome', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
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
            ->add('dateObtention', DateType::class, [
                'label' => false,
                'widget' => 'single_text',
                'format' => 'yyyy',
                'html5' => false,
                'attr' => [
                    'placeholder' => 'AAAA',
                ],
            ])
            ->add('dejaExperience', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('dernierMetier', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('dureeExperience', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('entrepriseExperience', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('niveauRemuneration', ChoiceType::class, [
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
            ->add('salarie')
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
            ->add('statutSalarie', ChoiceType::class, [
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
            ->add('statutCommentaire', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('entrepriseSalarie', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('adresseEntreprise', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('villeEntreprise', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('cpEntreprise', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('nomTuteur', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('prenomTuteur', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('adresseMaillTuteur', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('telephoneTuteur', TextType::class, [
                'label' => false,
        'attr' => [
            'class' => 'form-control py-1 px-2',
            'style' => 'border: none; border-radius: 5px;',  ],
        ])
            ->add('user_form', HiddenType::class,)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
