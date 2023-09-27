<?php

namespace App\Form;

// use App\Entity\Emails;
use App\Controller\EmailController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
// use Symfony\Component\Form\Extension\Core\Type\EmailType;

class SendFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block order-b-2 w-full h-20 outline-none',
                    'placeholder' => 'Naam'
                ),
                'label' => 'Name',
                'required' => true,
                'mapped' => false
            ])
            ->add('description', TextAreaType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block order-b-2 w-full h-20 outline-none',
                    'placeholder' => 'Beschrijving'
                ),
                'label' => 'Description',
                'required' => true,
                'mapped' => false
                ])
            ->add('bounty', IntegerType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block order-b-2 w-full h-20 outline-none',
                    'placeholder' => 'Bounty  Beli'
                ),
                'label' => 'Bounty',
                'required' => true,
                'mapped' => false
                ])
            ->add('imagePath', FileType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block order-b-2 w-full h-20 outline-none',
                    'placeholder' => 'Afbeelding'
                ),
                'label' => 'Image',
                'required' => true,
                'mapped' => false
                ])
        ;
    }
  


}
