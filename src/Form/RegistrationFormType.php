<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', RepeatedType::class, [
                'type' => EmailType::class,
                'invalid_message' => 'Les Emails ne sont pas identiques.',
                'options' => ['attr' => ['class' => 'duo password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Entrez votre Email'],
                'second_options' => ['label' => 'Confirmez votre Email'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veillez entrer un Email',
                    ]),

                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez être d\'accord avec les thermes.',
                    ]),
                ],
                
            ])
                ->add('plainPassword', RepeatedType::class, [
                    'type' => PasswordType::class,
                    'invalid_message' => 'Les mots de passe ne sont pas identiques.',
                    'options' => ['attr' => ['class' => 'duo password-field']],
                    'required' => true,
                    'first_options'  => ['label' => 'Choissisez votre mot de passe (8 caractères minimum)',],
                    'second_options' => ['label' => 'Confirmez votre mot de passe'],
                    // instead of being set onto the object directly,
                    // this is read and encoded in the controller
                    'mapped' => false,
                
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veillez entrer un mot de passe',
                        ]),
                        new Length([
                            'min' => 8,
                            'minMessage' => 'Votre mot de passe doit comporter au moins {{ limit }} caractères.',
                            // max length allowed by Symfony for security reasons
                            'max' => 128,
                        ]),
                    ],
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
