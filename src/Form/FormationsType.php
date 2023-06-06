<?php

namespace App\Form;

use App\Entity\Formations;
use App\Form\FormationsType;
use App\Entity\SiteFormation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class FormationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('poleFormation', EntityType::class, [
                'class' => SiteFormation::class,
                'choice_label' => 'nom',
            ])
            ->add('intituleFormation')
            ->add('typeCertFormation')
            ->add('dateDebutFormation', DateType::class)
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
