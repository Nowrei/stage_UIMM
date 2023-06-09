<?php

namespace App\Form;

use App\Entity\Formations;
use App\Entity\SiteFormation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FormationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('poleFormation', EntityType::class, [
                'class' => SiteFormation::class,
                'choice_label' => 'nom',
                'label' => 'Pole Formation Champagne-Ardenne *',
                'required' => true,
                'attr' => [
                    'class' => 'appearance-none  py-1 px-2 bg-white rounded-lg w-80',
                    'style' => 'border: none; border-radius: 5px;',
                ],
            ])
            ->add('intituleFormation', TextType::class, [

                'label' => 'Intitulé de la formation *',
                'attr' => [
                    'class' => 'appearance-none  py-1 px-2 bg-white rounded-lg w-80',
                    'style' => 'border: none; border-radius: 5px;',
                ],
            ])
            ->add('typeCertFormation', ChoiceType::class, [
                'label' => 'Type de certification',
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
                    'class' => 'appearance-none  py-1 px-2 bg-white rounded-lg w-50',
                    'style' => 'border: none; border-radius: 5px;',
                ],
            ])
            ->add('dateDebutFormation',  DateType::class, [
                'required' => false,
                'label' => 'Date début formation',
                'format' => 'dd-MM-yyyy',
                'years' => range(date('Y') - 100, date('Y') + 18),
                'placeholder' => [
                    'year' => 'AAAA',
                    'month' => 'MM',
                    'day' => 'JJ',
                ],
                'years' => range(date('Y') - 13, date('Y') + 3),
                'attr' => [
                    'class' => 'appearance-none  py-1 px-2  rounded-lg',
                    'style' => 'border: none; border-radius: 5px;',
                ],  ],)
            ->add('dateFinFormation', DateType::class, [
                'required' => false,
                'label' => "Date de fin de formation",
                'format' => 'dd-MM-yyyy',
                'placeholder' => [
                    'year' => 'AAAA',
                    'month' => 'MM',
                    'day' => 'JJ',
                ],
                'years' => range(date('Y') - 13, date('Y') + 3),
                'attr' => [
                    'class' => 'appearance-none  py-1 px-2  rounded-lg',
                    'style' => 'border: none; border-radius: 5px;',
                ],  ],)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formations::class,
        ]);
    }
}
