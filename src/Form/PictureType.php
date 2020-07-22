<?php

namespace App\Form;

use App\Entity\Picture;
use App\Entity\Tech;
use App\Entity\User;
use App\Entity\Project;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class PictureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => "Picture name"])
            ->add('urlFile', VichFileType::class, [
                'label' => "Picture",
                'required'      => false,
                'allow_delete'  => false, // not mandatory, default is true
                'download_uri' => false, // not mandatory, default is true
            ])
            ->add('project', EntityType::class, [
                'label' => 'Project',
                'placeholder' => "",
                'required' => false,
                'class' => Project::class,
                'choice_label' => function (Project $project) {
                    return $project->getName();
                },
                'by_reference'=> false,
            ])
            ->add('tech', EntityType::class, [
                'label' => 'Techs',
                'placeholder' => "",
                'required' => false,
                'class' => Tech::class,
                'choice_label' => function (Tech $tech) {
                    return $tech->getName();
                },
                'by_reference'=> false,
            ])
            ->add('user', EntityType::class, [
                'label' => 'User',
                'placeholder' => "",
                'required' => false,
                'class' => User::class,
                'choice_label' => function (User $user) {
                    return $user->getFirstname() . $user->getLastname() ;
                },
                'by_reference'=> false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Picture::class,
        ]);
    }
}
