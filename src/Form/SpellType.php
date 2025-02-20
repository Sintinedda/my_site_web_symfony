<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Spell;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpellType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name_fr', TextType::class)
            ->add('name_eng', TextType::class)
            ->add('level', IntegerType::class)
            ->add('school', ChoiceType::class, [
                'choices' => [
                    'Abjuration' => 'abjuration',
                    'Divination' => 'divination',
                    'Enchantement' => 'enchantement',
                    'Évocation' => 'évocation',
                    'Illusion' => 'illusion',
                    'Nécromancie' => 'nécromancie',
                    'Transmutation' => 'transmutation'
                ]
            ])
            ->add('casting_time', TextType::class)
            ->add('range_effect', TextType::class)
            ->add('components', ChoiceType::class, [
                'choices' => [
                    'V' => 'V',
                    'V, S' => 'V, S',
                    'V, S, M' => 'V, S, M',
                    'V, M' => 'V, M',
                    'S' => 'S',
                    'S, M' => 'S, M',
                    'M' => 'M'
                ]
            ])
            ->add('components_ingredients', TextType::class, [
                'required' => false
            ])
            ->add('duration', TextType::class)
            ->add('descr1', TextareaType::class)
            ->add('descr2', TextareaType::class, [
                'required' => false
            ])
            ->add('descr3', TextareaType::class, [
                'required' => false
            ])
            ->add('descr4', TextareaType::class, [
                'required' => false
            ])
            ->add('descr5', TextareaType::class, [
                'required' => false
            ])
            ->add('descr6', TextareaType::class, [
                'required' => false
            ])
            ->add('descr7', TextareaType::class, [
                'required' => false
            ])
            ->add('descr8', TextareaType::class, [
                'required' => false
            ])
            ->add('descr9', TextareaType::class, [
                'required' => false
            ])
            ->add('descr10', TextareaType::class, [
                'required' => false
            ])
            ->add('upper_level', TextareaType::class, [
                'required' =>false
            ])
            ->add('source', TextType::class)
            ->add('ritual')
            ->add('concentration')
            ->add('classes', EntityType::class, [
                'class' => Classe::class,
                'choice_label' => 'name',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Spell::class,
        ]);
    }
}
