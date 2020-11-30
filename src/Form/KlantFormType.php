<?php

namespace App\Form;

use App\Entity\Klant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KlantFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Firstname', TextType::class)
            ->add('Surname', TextType::class)
            ->add('postcode', TextType::class)
            ->add('email', EmailType::class)
            ->add('email2', EmailType::class)
            ->add('mobile', TextType::class)
            ->add('mobile2', TextType::class)
            ->add('adress', TextType::class)
            ->add('postcode', TextType::class)
            ->add('city', TextType::class)
            ->add('Opmerking', TextAreaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Klant::class,
        ]);
    }
}