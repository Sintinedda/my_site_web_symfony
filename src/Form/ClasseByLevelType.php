<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\ClasseByLevel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClasseByLevelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('level', IntegerType::class)
            ->add('bm', IntegerType::class)
            ->add('rage', TextType::class, [
                'required' => false
            ])
            ->add('damage', IntegerType::class, [
                'required' => false
            ])
            ->add('cantrip', IntegerType::class, [
                'required' => false
            ])
            ->add('knowing_spells', IntegerType::class, [
                'required' => false
            ])
            ->add('spell_one', IntegerType::class, [
                'required' => false
            ])
            ->add('spell_two', IntegerType::class, [
                'required' => false
            ])
            ->add('spell_three', IntegerType::class, [
                'required' => false
            ])
            ->add('spell_four', IntegerType::class, [
                'required' => false
            ])
            ->add('spell_five', IntegerType::class, [
                'required' => false
            ])
            ->add('spell_six', IntegerType::class, [
                'required' => false
            ])
            ->add('spell_seven', IntegerType::class, [
                'required' => false
            ])
            ->add('spell_eight', IntegerType::class, [
                'required' => false
            ])
            ->add('spell_nine', IntegerType::class, [
                'required' => false
            ])
            ->add('sorcery_point', IntegerType::class, [
                'required' => false
            ])
            ->add('martial_art', TextType::class, [
                'required' => false
            ])
            ->add('ki', IntegerType::class, [
                'required' => false
            ])
            ->add('movement_without_armor', TextType::class, [
                'required' => false
            ])
            ->add('slot_space', IntegerType::class, [
                'required' => false
            ])
            ->add('slot_level', IntegerType::class, [
                'required' => false
            ])
            ->add('invocation_know', IntegerType::class, [
                'required' => false
            ])
            ->add('sneak_attack', TextType::class, [
                'required' => false
            ])
            ->add('classe', EntityType::class, [
                'class' => Classe::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ClasseByLevel::class,
        ]);
    }
}
