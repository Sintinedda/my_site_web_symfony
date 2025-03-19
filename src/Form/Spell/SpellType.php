<?php

namespace App\Form\Spell;

use App\Entity\Classe\Classe;
use App\Entity\Source\Part;
use App\Entity\Source\Source;
use App\Entity\Spell\Spell;
use App\Entity\Spell\SpellSchool;
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
            ->add('slug', TextType::class)
            ->add('name_eng', TextType::class)
            ->add('level', IntegerType::class)
            ->add('school', EntityType::class, [
                'class' => SpellSchool::class,
                'choice_label' => 'name'
            ])
            ->add('ritual')
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
            ->add('concentration')
            ->add('duration', TextType::class)
            ->add('short_descr', TextareaType::class)
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
            ->add('descr11', TextareaType::class, [
                'required' => false
            ])
            ->add('descr12', TextareaType::class, [
                'required' => false
            ])
            ->add('descr13', TextareaType::class, [
                'required' => false
            ])
            ->add('upper_level', TextareaType::class, [
                'required' =>false
            ])
            ->add('source', EntityType::class, [
                'class' => Source::class,
                'choice_label' => 'name'
            ])
            ->add('sourcePart', EntityType::class, [
                'class' => Part::class,
                'choice_label' => 'number',
                'required' => false
            ])
            ->add('ua')
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
