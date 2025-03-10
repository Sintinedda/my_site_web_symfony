<?php

namespace App\Form\StatBlock;

use App\Entity\StatBlock\StatBlockAction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StatBlockActionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('descr', TextareaType::class, [
                'required' => false
            ])
            ->add('target', TextType::class, [
                'required' => false
            ])
            ->add('type', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Attaque au corps à corps avec une arme :' => 'w-cac',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StatBlockAction::class,
        ]);
    }
}
