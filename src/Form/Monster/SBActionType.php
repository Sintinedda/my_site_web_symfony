<?php

namespace App\Form\Monster;

use App\Entity\Monster\SBAction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SBActionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('descr', TextareaType::class, [
                'required' => false
            ])
            ->add('type', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Attaque au corps à corps avec une arme :' => 'w-cac',
                    'Attaque à distance avec une arme :' => 'w-range',
                ]
            ])
            ->add('target', TextType::class, [
                'required' => false
            ])
            ->add('damage', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Acide' => 'acide',
                    'Contondant' => 'contondant',
                    'Feu' => 'feu',
                    'Force' => 'force',
                    'Foudre' => 'foudre',
                    'Froid' => 'froid',
                    'Nécrotique' => 'nécrotique',
                    'Perforant' => 'perforant',
                    'Poison' => 'poison',
                    'Psychique' => 'psychique',
                    'Radiant' => 'radiant',
                    'Tonnerre' => 'tonnerre',
                    'Tranchant' => 'tranchant',
                    'C/P/S au choix' => 'contondant, perforant ou tranchants (au choix)'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SBAction::class,
        ]);
    }
}
