<?php

namespace App\Form;

use App\Entity\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, ['label' => "Email *", 'empty_data' => ''])
            ->add('subject', null, ['label' => "subject *", 'required' => false, 'empty_data' => ''])
            ->add('message', null, ['label' => "Message *", 'empty_data' => ''])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContactForm::class,
        ]);
    }
}
