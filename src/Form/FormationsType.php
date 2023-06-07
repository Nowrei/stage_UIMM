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
                'required' => true
            ])
            ->add('intituleFormation', TextType::class, [

                'label' => 'Intitulé de la formation *',
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
                    'class' => 'appearance-none  py-1 px-2 bg-white rounded-lg',
                ],
            ])
            ->add('dateDebutFormation',  DateType::class, [
                'required' => true,
                'label' => false,
                'format' => 'dd-MM-yyyy',
                'years' => range(date('Y') - 100, date('Y') + 18),
              
            'attr' => [
                'class' => 'form-control py-1 px-2 flex flex-row',
                'style' => 'border: none; border-radius: 5px;',  ],  ],)
            ->add('dateFinFormation', DateType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formations::class,
        ]);
    }
}
