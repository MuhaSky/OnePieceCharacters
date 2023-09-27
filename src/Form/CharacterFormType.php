<?php

namespace App\Form;

use App\Entity\Characters;
use App\Entity\Race;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CharacterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block order-b-2 w-full h-20 outline-none',
                    'placeholder' => 'Naam...'
                ),
                //'label' => false,
                'required' => false
            ])
            ->add('age', IntegerType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block order-b-2 w-full h-20 outline-none',
                    'placeholder' => 'Leeftijd...'
                ),
                //'label' => false,
                'required' => false
            ])
            ->add('description', TextareaType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block order-b-2 w-full h-20 outline-none',
                    'placeholder' => 'Beschrijving...'
                ),
                //'label' => false,
                'required' => false
            ])
            ->add('gender', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block order-b-2 w-full h-20 outline-none',
                    'placeholder' => 'Geslacht...'
                ),
                //'label' => false,
                'required' => false
            ])
            ->add('groupSort', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block order-b-2 w-full h-20 outline-none',
                    'placeholder' => 'Groep soort...'
                ),
                //'label' => false,
                'required' => false
            ])
            ->add('races', EntityType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block order-b-2 w-full h-20 outline-none',
                    // 'placeholder' => 'Race...',
                ),
                'class' => Race::class,
                //'label' => false,
                'required' => false,
                'placeholder' => 'Choose an race'
            ])
            ->add('imagePath', FileType::class, array(
                'required' => false,
                'mapped' => false,
                //'label' => false,
                'required' => false
            ))
        ;
    }
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Characters::class,
        ]);
    }
}
