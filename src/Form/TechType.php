<?php

namespace App\Form;

use App\Entity\Method;
use App\Entity\Project;
use App\Entity\Tech;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TechType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, ['label' => "Tech name *", 'required' => false, 'empty_data' => ''])
            ->add('projects', EntityType::class, [
                'label' => 'Projects',
                'class' => Project::class,
                'choice_label' => function (Project $project) {
                    return $project->getName();
                },
                'expanded' => true,
                'multiple' => true,
                'by_reference'=> false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tech::class,
        ]);
    }
}
