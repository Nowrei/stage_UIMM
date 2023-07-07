<?php

namespace App\Form;

use App\Entity\User;

use App\Form\FormationsType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class UserFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->setRequired(false);
        $builder

            //coordonnées

            ->add('codeCiviliteApprenant', ChoiceType::class, [
                'label' => 'Civilité *',
                'required' => true,
                'choices' => [
                    'Civilité' => null,
                    'Monsieur' => 1,
                    'Madame' => 2,

                ],
                'attr' => [
                    'class' => 'appearance-none w-250 py-1 px-2 w-10 bg-white rounded-lg flex flex-column',
                ],
                'constraints' => [

                    new NotNull(
                        message: 'Veuillez renseigner votre civilité.'
                    ),
                ],
            ])

            ->add(
                'nomApprenant',
                TextType::class,
                [
                    'label' => 'Nom *',
                    'required' => true,
                    'attr' => [
                        'class' => 'form-control py-1 px-2 flex flex-column ',
                        'style' => 'border: none; border-radius: 5px;',
                    ],
                    'constraints' => [
                        new NotBlank(
                            message: 'Veuillez entrer votre nom.'
                        ),
                    ],
                ],


            )
            ->add('nomJf', TextType::class, [
                'label' => 'Nom d\'usage',
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
            ],)

            ->add('prenomApprenant', TextType::class, [
                'required' => true,
                'label' => 'Prenom *',
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
                'constraints' => [
                    new NotBlank(
                        message: 'Veuillez entrer votre prénom.'
                    ),
                ],
            ],)

            ->add('dateNaissance', TextType::class, [
                'required' => true,
                'label' => 'Date de naissance *',

                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;}',
                    'placeholder' => 'JJ/MM/AAAA',
                ],
                'constraints' => [
                    new NotBlank(
                        message: 'Veuillez entrer une date de naissance.'
                    ),
                    new Regex(
                        '/\d{1,2}\/\d{1,2}\/\d{4}/',
                        '{{ value }} n\'est pas une date valide.'

                    )
                ],
            ],)

            ->add('tel1Appr', TextType::class, [
                'required' => true,
                'label' => 'Téléphone portable *',
                'attr' => [
                    'placeholder' => '0123456789',
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
                'constraints' => [
                    new NotBlank(
                        message: 'Veuillez entrer un numéro de téléphone.'
                    ),
                    new Regex(
                        '/^(\\+[1-9]\\d{0,2})?\\s*\\(?\\d{3}\\)?[-.\\s]?\\d{3}[-.\\s]?\\d{4}$/',
                        '{{ value }} n\'est pas un numéro de téléphone valide.'

                    )
                ],

            ],)

            ->add('tel2Appr', TextType::class, [
                'label' => 'Téléphone fixe',
                'attr' => [
                    'placeholder' => '0123456789',
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ], 'constraints' => [

                    new Regex(
                        '/^(\\+[1-9]\\d{0,2})?\\s*\\(?\\d{3}\\)?[-.\\s]?\\d{3}[-.\\s]?\\d{4}$/',
                        '{{ value }} n\'est pas un numéro de téléphone valide.'

                    )
                ],

            ],)

            ->add('emailAppr', EmailType::class, [
                'label' => 'Email *',
                'required' => true,
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
                'constraints' => [
                    new NotBlank(
                        message: 'Veuillez entrer une adresse email.'
                    ),
                ],
            ],)

            ->add('adresse1Appr', TextType::class, [
                'required' => true,
                'label' => 'Adresse *',
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
                'constraints' => [
                    new NotBlank(
                        message: 'Veuillez entrer une adresse.'
                    ),
                ],
            ],)

            ->add('adresse2Appr', TextType::class, [
                'label' => 'Détail (Bâtiment, N° Appt)',
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],

            ],)

            ->add('cpAppr', TextType::class, [
                'label' => 'Code postal *',
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                    'maxlength' => 5, // Limite maximale de 5 caractères  
                ],
                'constraints' => [
                    new Length([
                        'min' => 5, // Limite minimale de 5 caractères
                        'minMessage' => 'Le champ doit contenir au moins {{ limit }} caractères',
                    ]),
                    new NotBlank(
                        message: 'Veuillez entrer un code postal'
                    ),
                    new Regex(
                        '/^\d+$/',
                        'Seul des chiffres sont autorisés.'
                    )
                ],
            ],)
            ->add('villeAppr', TextType::class, [
                'label' => 'Ville *',
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
                'constraints' => [
                    new NotBlank(
                        message: 'Veuillez entrer une ville de résidance.'
                    ),
                ],
            ],)

            ->add('lieuNaissance', TextType::class, [
                'label' => 'Ville de naissance *',
                'required' => true,
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
                'constraints' => [
                    new NotBlank(
                        message: 'Veuillez entrer votre ville de naissance.'
                    ),
                ],
            ],)

            ->add('idPays', ChoiceType::class, [
                'label' => 'Pays *',
                'placeholder' => 'France',
                'required' => true,
                'choices' => [

                    $options['listePays']
                ],
                'attr' => [
                    'class' => 'appearance-none py-1 px-2 w-10 bg-white rounded-lg',
                    'style' => 'border: none; border-radius: 5px;',
                ],
                'empty_data' => '1',
            ])

            ->add('paysNaissance', ChoiceType::class, [
                'label' => 'Pays de naissance *',
                'placeholder' => 'Pays de naissance',
                'empty_data' => null,
                'choices' => $options['listePays'],
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
                'constraints' => [

                    new NotNull(
                        message: 'Veuillez renseigner votre pays de naissance.'
                    ),
                ],
            ],)

            ->add('idNationalite', ChoiceType::class, [
                'label' => 'Nationalité *',
                'required' => false,
                'placeholder' => 'Séléctioné votre nationalité',
                'empty_data' => null,
                'choices' => [

                    'Française' => '0',
                    'Union Européene' => '1',
                    'Hors union européene' => '2',


                ],
                'attr' => [
                    'class' => 'appearance-none w-250 py-1 px-2 w-10 bg-white rounded-lg',
                    'style' => 'border: none; border-radius: 5px;',
                ],
                'constraints' => [

                    new NotNull(
                        message: 'Veuillez renseigner votre pays de naissance.'
                    ),
                ],
            ])

            ->add('departementNaissance', TextType::class, [
                'label' => 'Numéro du département de naissance *',
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
                'constraints' => [
                    new NotBlank(
                        message: 'Veuillez entrer un département.'
                    ),
                    new Regex(
                        '/^(?:0[1-9]|[1-8][0-9]|9[0-5]|2A|2B|97[1-6]|98[4-7]|99[7-8])$/',
                        '{{ value }} n\'est pas un département français valide.'

                    )
                ],
            ])
            //formation

            ->add('dernierDiplome', TextType::class, [
                'label' => 'Dernier diplôme obtenu *',
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
                'constraints' => [
                    new NotBlank(
                        message: 'Veuillez entrer votre dernier diplôme obtenu.'
                    ),
                ],
            ],)

            ->add('niveauQualification', ChoiceType::class, [
                'label' => 'Niveau qualification *',
                'required' => true,

                'choices' => [
                    'Niveau de qualification' => null,
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
                    'placeholder' => 'Niveau de qualification'
                ],
                'constraints' => [

                    new NotNull(
                        message: 'Veuillez renseigner le niveau de votre diplôme.'
                    ),
                ],
            ],)

            ->add('dateObtention', DateType::class, [
                'label' => 'Année d\'obtention *',
                'widget' => 'single_text',
                'format' => 'yyyy',
                'html5' => false,
                'attr' => [
                    'placeholder' => 'AAAA',
                    'class' => 'appearance-none  py-1 px-2 bg-white rounded-lg',
                    'style' => 'border: none; border-radius: 5px;',
                ],

            ])
            ->add('dejaExperience', HiddenType::class)

            ->add('dernierMetier', TextType::class, [
                'label' => 'Dernier métier exercé *',
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],

            ],)

            ->add('dureeExperience', TextType::class, [
                'label' => 'Durée de l\'expérience en année *',
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
            ],)

            ->add('entrepriseExperience', TextType::class, [
                'label' => 'Entreprise *',
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
            ],)

            ->add('niveauRemuneration', ChoiceType::class, [
                'label' => 'Niveau de rémunération',
                'required' => false,
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
                    'class' => 'appearance-none  py-1 px-2 bg-white rounded-lg flex flex-column',
                ],
            ],)

            //->add('salarie', CheckboxType::class)


            ->add('statut', ChoiceType::class, [
                'label' => 'Sous quel statut-allez vous effectuer la formation ? *',
                'required' => true,
                'choices' => [
                    'Statut' => '',
                    'CPF' => 'CPF',
                    'Financement Région' => 'Financement Région',
                    'POE Individuelle' => 'POE Individuelle',
                    'POE COllective' => 'POE Collective',
                    'VAE' => 'VAE',
                    'Autre' => 'Autre',



                ],
                'attr' => [
                    'class' => 'appearance-none  py-1 px-2 bg-white rounded-lg',
                    'style' => 'border: none; border-radius: 5px;',
                ],
            ],)

            ->add('statutSalarie', ChoiceType::class, [
                'label' => 'Sous quel statut allez vous effecteur la formation ? *',
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
                    'class' => 'appearance-none py-1 px-2 bg-white rounded-lg sm:text-ellipsis',
                    'style' => 'max-width: 100%; word-wrap: break-word; border: none; border-radius: 5px;',
                ],
            ],)

            ->add('statutCommentaire', TextType::class, [
                'label' => 'Commentaire autre formation',
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
            ],)

            ->add('entrepriseSalarie', TextType::class, [
                'label' => 'Entreprise *',
                'required' => true,
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
            ],)

            ->add('adresseEntreprise', TextType::class, [
                'label' => 'Adresse de l\'entreprise *',
                'required' => true,
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
            ],)

            ->add('villeEntreprise', TextType::class, [
                'label' => 'Ville de l\'entreprise *',
                'required' => true,
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
            ],)

            ->add('cpEntreprise', TextType::class, [
                'label' => 'Code postal *',
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
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

            ->add('nomTuteur', TextType::class, [
                'label' => 'Nom du tuteur',
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
            ],)
            ->add('prenomTuteur', TextType::class, [
                'label' => 'Prenom du tuteur',
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
            ],)
            ->add('adresseMaillTuteur', TextType::class, [
                'label' => 'Adresse Mail du tuteur',
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
            ],)
            ->add('telephoneTuteur', TextType::class, [
                'label' => 'Téléphone du tuteur',
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;',
                ],
            ])
            ->add('formations', CollectionType::class, [
                // each entry in the array will be an "email" field
                'entry_type' => FormationsType::class,
                // these options are passed to each "email" type
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'constraints' => [
                    new NotBlank(
                        message: 'Veuillez entrer votre dernier diplme obtenu.'
                    ),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'listePays' => [],
        ]);
    }
}
