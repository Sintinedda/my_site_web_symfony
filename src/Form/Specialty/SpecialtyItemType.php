<?php

namespace App\Form\Specialty;

use App\Entity\Source\Part;
use App\Entity\Source\Source;
use App\Entity\Specialty\SpecialtyItem;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpecialtyItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('part', TextType::class, [
                'required' => false
            ])
            ->add('part2', TextType::class, [
                'required' => false
            ])
            ->add('name', TextType::class)
            ->add('slug',TextType::class)
            ->add('sources', EntityType::class, [
                'class' => Source::class,
                'multiple' => true,
                'choice_label' => 'name'
            ])
            ->add('sourceParts', EntityType::class, [
                'class' => Part::class,
                'choice_label' => 'number',
                'multiple' => true,
                'required' => false
            ])
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
            ->add('ua')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SpecialtyItem::class,
        ]);
    }
}
