<?php

namespace App\Form\Talent;

use App\Entity\Race\SourceRace;
use App\Entity\Race\Subrace;
use App\Entity\Talent\Talent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TalentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('descr1', TextareaType::class)
            ->add('descr2', TextAreaType::class, [
                'required' => false
            ])
            ->add('descr3', TextAreaType::class, [
                'required' => false
            ])
            ->add('descr4', TextAreaType::class, [
                'required' => false
            ])
            ->add('descr5', TextAreaType::class, [
                'required' => false
            ])
            ->add('descr6', TextAreaType::class, [
                'required' => false
            ])
            ->add('descr7', TextAreaType::class, [
                'required' => false
            ])
            ->add('descr8', TextAreaType::class, [
                'required' => false
            ])
            ->add('descr9', TextAreaType::class, [
                'required' => false
            ])
            ->add('descr10', TextAreaType::class, [
                'required' => false
            ])
            ->add('race', EntityType::class, [
                'class' => SourceRace::class,
                'choice_label' => 'id',
                'multiple' => true,
                'required' => false
            ])
            ->add('subrace', EntityType::class, [
                'class' => Subrace::class,
                'choice_label' => 'id',
                'multiple' => true,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Talent::class,
        ]);
    }
}
