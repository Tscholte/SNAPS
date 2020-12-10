<?php

namespace App\Form;

use App\Entity\Room;
use App\Entity\AuPair;
use App\Entity\Klant;
use App\Repository\KlantRepository;
use App\Repository\AuPairRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoomFormType extends AbstractType
{

    private $AuPairRepository;
    public function __construct(AuPairRepository $AuPairRepository, KlantRepository $KlantRepository)
    {
        $this->AuPairRepository = $AuPairRepository;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        

        $builder
            ->add('AuPair', EntityType::class, array(
                'class'             =>  AuPair::class,
                'choices'           =>  $this->AuPairRepository->getAll(),
                'choice_label'      =>  'name',
            ))
            ->add('korting', ChoiceType::class, [
                'choices' => [
                    'none' => NULL,
                    '10%'=> 0.1,
                    '20%'=> 0.2,
                    '30%'=> 0.3
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Null
            ]);
    }
}