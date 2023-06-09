<?php

namespace App\Form;

use App\Entity\Formations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class PoleFormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('poleFormation', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('intituleFormation', TextType::class, [
                'label' => false,
            'attr' => [
                'class' => 'form-control py-1 px-2',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('typeCertFormation', ChoiceType::class, [
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
            ->add('dateDebutFormation', DateType::class, [
                'label' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'html5' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;}', 
                    'placeholder' => 'JJ/MM/AAAA', 
                ],
            ])
            ->add('dateFinFormation', DateType::class, [
                'label' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'html5' => false,
                'attr' => [
                    'class' => 'form-control py-1 px-2 flex flex-column',
                    'style' => 'border: none; border-radius: 5px;}', 
                    'placeholder' => 'JJ/MM/AAAA', 
                ],
            ])
            ->add('users' , HiddenType::class,)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
           
        ]);
    }
}
