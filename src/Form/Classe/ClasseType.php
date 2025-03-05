<?php

namespace App\Form\Classe;

use App\Entity\Classe\Classe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClasseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('slug', TextType::class)
            ->add('descr', TextareaType::class)
            ->add('dv', IntegerType::class)
            ->add('Armor', TextType::class)
            ->add('weapon', TextType::class)
            ->add('tool', TextType::class)
            ->add('save', TextType::class)
            ->add('competence', TextType::class)
            ->add('equipment1', TextType::class)
            ->add('equipment2', TextType::class, [
                'required' => false
            ])
            ->add('equipment3', TextType::class, [
                'required' => false
            ])
            ->add('equipment4', TextType::class, [
                'required' => false
            ])
            ->add('equipment5', TextType::class, [
                'required' => false
            ])
            ->add('icon', TextType::class)
            ->add('rage')
            ->add('damage')
            ->add('cantrip')
            ->add('knowing_spells')
            ->add('spell')
            ->add('sorcery_point')
            ->add('martial_art')
            ->add('ki')
            ->add('movement_without_armor')
            ->add('slot_space')
            ->add('slot_level')
            ->add('invocation_know')
            ->add('sneak_attack')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Classe::class,
        ]);
    }
}
