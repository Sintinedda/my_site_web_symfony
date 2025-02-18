<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\ClasseByLevel;
use App\Entity\Skill;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClasseByLevelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('level')
            ->add('bm')
            ->add('rage')
            ->add('damage')
            ->add('cantrip')
            ->add('knowing_spells')
            ->add('spell_one')
            ->add('spell_two')
            ->add('spell_three')
            ->add('spell_four')
            ->add('spell_five')
            ->add('spell_six')
            ->add('spell_seven')
            ->add('spell_eight')
            ->add('spell_nine')
            ->add('sorcery_point')
            ->add('martial_art')
            ->add('ki')
            ->add('movement_without_armor')
            ->add('slot_space')
            ->add('slot_level')
            ->add('invocation_know')
            ->add('sneak_attack')
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
