<?php

namespace App\Form\Race;

use App\Entity\Race\SourceRace;
use App\Entity\Race\Subrace;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubraceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('slug', TextType::class)
            ->add('book', TextType::class, [
                'required' => false
            ])
            ->add('descr1', TextareaType::class, [
                'required' => false
            ])
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
            ->add('ability_inc', TextAreaType::class, [
                'required' => false
            ])
            ->add('type', TextAreaType::class, [
                'required' => false
            ])
            ->add('age', TextAreaType::class, [
                'required' => false
            ])
            ->add('alignment', TextAreaType::class, [
                'required' => false
            ])
            ->add('size', TextAreaType::class, [
                'required' => false
            ])
            ->add('speed', TextAreaType::class, [
                'required' => false
            ])
            ->add('language', TextAreaType::class, [
                'required' => false
            ])
            ->add('source', EntityType::class, [
                'class' => SourceRace::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Subrace::class,
        ]);
    }
}
