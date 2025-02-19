<?php

namespace App\Form;

use App\Entity\ClasseByLevel;
use App\Entity\Skill;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SkillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('descr1', TextType::class, [
                'required' => false
            ])
            ->add('descr2', TextType::class, [
                'required' => false
            ])
            ->add('descr3', TextType::class, [
                'required' => false
            ])
            ->add('descr4', TextType::class, [
                'required' => false
            ])
            ->add('descr5', TextType::class, [
                'required' => false
            ])
            ->add('descr6', TextType::class, [
                'required' => false
            ])
            ->add('descr7', TextType::class, [
                'required' => false
            ])
            ->add('descr8', TextType::class, [
                'required' => false
            ])
            ->add('descr9', TextType::class, [
                'required' => false
            ])
            ->add('descr10', TextType::class, [
                'required' => false
            ])
            ->add('classe', EntityType::class, [
                'class' => ClasseByLevel::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Skill::class,
        ]);
    }
}
