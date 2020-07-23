<?php

namespace App\Form;

use App\Entity\Project;
use DateTime;
use App\Entity\Tech;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, ['label' => "Project name *", 'required' => false, 'empty_data' => ''])
            ->add('date', DateType::class, [
                'label' => "Date",
                'format' => 'dd MM yyyy',
                "data" => new DateTime(),
            ])
            ->add('description', CKEditorType::class, [
                'label' => "Description *",
                'empty_data' => '',
                'config' => [
                    'uiColor' => '#ffffff',
                ]
            ])
            ->add('display', ChoiceType::class, [
                'label' => "Display project?",
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ]])
            ->add('github', TextType::class, ['label' => "Github", 'required' => false])
            ->add('link', TextType::class, ['label' => "Website", 'required' => false])
            ->add('techs', EntityType::class, [
                'label' => 'Techs',
                'class' => Tech::class,
                'choice_label' => function (Tech $tech) {
                    return $tech->getName();
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
            'data_class' => Project::class,
        ]);
    }
}
