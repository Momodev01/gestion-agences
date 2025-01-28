<?php

namespace App\Form;

use App\Entity\Agence;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numero', TextType::class, options: [
                'attr' => [
                    'class' => 'bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5 mb-2',
                ],
            ])
            ->add('adresse', TextType::class, [
                'attr' => [
                    'class' => 'bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5 mb-2',
                ],
            ])
            ->add('telephone', TextType::class, [
                'attr' => [
                    'class' => 'bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5 mb-2',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Submit',
                'attr' => [
                    'class' => 'text-white bg-blue-700 px-10 py-2 rounded-lg w-full mt-5'
                ]
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Agence::class,
        ]);
    }
}
