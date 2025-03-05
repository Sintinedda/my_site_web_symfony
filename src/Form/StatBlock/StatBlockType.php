<?php

namespace App\Form\StatBlock;

use App\Entity\Specialty\SpecialtySkill;
use App\Entity\StatBlock\StatBlock;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StatBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name_fr', TextType::class)
            ->add('slug', TextType::class)
            ->add('name_eng', TextType::class)
            ->add('type', TextType::class, [
                'required' => false
            ])
            ->add('alignement', TextType::class, [
                'required' => false
            ])
            ->add('armor', TextType::class, [
                'required' => false
            ])
            ->add('pv', TextType::class, [
                'required' => false
            ])
            ->add('speed', TextType::class, [
                'required' => false
            ])
            ->add('strenght', IntegerType::class)
            ->add('dexterity', IntegerType::class)
            ->add('constitution', IntegerType::class)
            ->add('intelligence', IntegerType::class)
            ->add('wisdow', IntegerType::class)
            ->add('charisma', IntegerType::class)
            ->add('save', TextType::class, [
                'required' => false
            ])
            ->add('competence', TextType::class, [
                'required' => false
            ])
            ->add('immunity_damage', TextType::class, [
                'required' => false
            ])
            ->add('immunity_condition', TextType::class, [
                'required' => false
            ])
            ->add('sens', TextType::class, [
                'required' => false
            ])
            ->add('language', TextType::class, [
                'required' => false
            ])
            ->add('fp', TextType::class, [
                'required' => false
            ])
            ->add('bm', TextType::class, [
                'required' => false
            ])
            ->add('specialty_skill', EntityType::class, [
                'class' => SpecialtySkill::class,
                'choice_label' => 'name',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StatBlock::class,
        ]);
    }
}
