<?php

namespace App\Form\Monster;

use App\Entity\Monster\SB;
use App\Entity\Source\Part;
use App\Entity\Source\Source;
use App\Entity\Specialty\SpecialtySkill;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SBType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options):void
    {
        $builder
            ->add('nom', TextType::class)
            ->add('slug', TextType::class)
            ->add('name', TextType::class)
            ->add('ua')
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Monstres' => 'Monstres',
                    'Animaux' => 'Animaux',
                    'PNJ' => 'PNJ',
                ]
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Humanoïde' => 'Humanoïde',
                    'Aberration' => 'Aberration',
                    'Artificiel' => 'Artificiel',
                    'Bête' => 'Bête',
                    'Céleste' => 'Céleste',
                    'Dragon' => 'Dragon',
                    'Élémentaire' => 'Élémentaire',
                    'Fée' => 'Fée',
                    'Fiélon' => 'Fiélon',
                    'Géant' => 'Géant',
                    'Monstruosité' => 'Monstruosité',
                    'Mort-vivant' => 'Mort-vivant',
                    'Plante' => 'Plante',
                    'Vase' => 'Vase',
                ]
            ])
            ->add('type2', TextType::class, [
                'required' => false
            ])
            ->add('sizes', ChoiceType::class, [
                'multiple' => true,
                'choices' => [
                    'TP' => 'TP',
                    'P' => 'P',
                    'M' => 'M',
                    'G' => 'G',
                    'TG' => 'TG',
                    'Gig' => 'Gig',
                ]
            ])
            ->add('size_inf')
            ->add('size_sup')
            ->add('align', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'sans alignement' => 'sans alignement',
                    'neutre' => 'neutre',
                    'neutre mauvais' => 'neutre mauvais',
                ]
            ])
            ->add('ca', IntegerType::class)
            ->add('armor', TextType::class, [
                'required' => false
            ])
            ->add('pv', IntegerType::class, [
                'required' => false
            ])
            ->add('dv', TextType::class, [
                'required' => false
            ])
            ->add('speed', TextType::class, [
                'required' => false
            ])
            ->add('str', IntegerType::class)
            ->add('dex', IntegerType::class)
            ->add('con', IntegerType::class)
            ->add('intell', IntegerType::class)
            ->add('wis', IntegerType::class)
            ->add('cha', IntegerType::class)
            ->add('save', TextType::class, [
                'required' => false
            ])
            ->add('comp', TextType::class, [
                'required' => false
            ])
            ->add('res_damage', ChoiceType::class, [
                'required' => false,
                'multiple' => true,
                'choices' => [
                    'Acide' => 'acide',
                    'Contondant' => 'contondant',
                    'Feu' => 'feu',
                    'Force' => 'force',
                    'Foudre' => 'foudre',
                    'Froid' => 'froid',
                    'Nécrotique' => 'nécrotique',
                    'Perforant' => 'perforant',
                    'Poison' => 'poison',
                    'Psychique' => 'psychique',
                    'Radiant' => 'radiant',
                    'Tonnerre' => 'tonnerre',
                    'Tranchant' => 'tranchant',
                ]
            ])
            ->add('res_state', ChoiceType::class, [
                'required' => false,
                'multiple' => true,
                'choices' => [
                    'À terre' => 'à terre',
                    'Agrippé ' => 'agrippé ',
                    'Assourdi ' => 'assourdi ',
                    'Aveuglé ' => 'aveuglé ',
                    'Charmé ' => 'charmé ',
                    'Effrayé ' => 'effrayé ',
                    'Empoisonné ' => 'empoisonné ',
                    'Entravé ' => 'entravé ',
                    'Épuisé' => 'épuisé',
                    'Étourdi ' => 'étourdi ',
                    'Inconscient ' => 'inconscient ',
                    'Invisible' => 'invisible',
                    'Neutralisé ' => 'neutralisé ',
                    'Paralysé ' => 'paralysé ',
                ]
            ])
            ->add('imm_damage', ChoiceType::class, [
                'required' => false,
                'multiple' => true,
                'choices' => [
                    'Acide' => 'acide',
                    'Contondant' => 'contondant',
                    'Feu' => 'feu',
                    'Force' => 'force',
                    'Foudre' => 'foudre',
                    'Froid' => 'froid',
                    'Nécrotique' => 'nécrotique',
                    'Perforant' => 'perforant',
                    'Poison' => 'poison',
                    'Psychique' => 'psychique',
                    'Radiant' => 'radiant',
                    'Tonnerre' => 'tonnerre',
                    'Tranchant' => 'tranchant',
                ]
            ])
            ->add('imm_state', ChoiceType::class, [
                'required' => false,
                'multiple' => true,
                'choices' => [
                    'À terre' => 'à terre',
                    'Agrippé ' => 'agrippé ',
                    'Assourdi ' => 'assourdi ',
                    'Aveuglé ' => 'aveuglé ',
                    'Charmé ' => 'charmé ',
                    'Effrayé ' => 'effrayé ',
                    'Empoisonné ' => 'empoisonné ',
                    'Entravé ' => 'entravé ',
                    'Épuisé' => 'épuisé',
                    'Étourdi ' => 'étourdi ',
                    'Inconscient ' => 'inconscient ',
                    'Invisible' => 'invisible',
                    'Neutralisé ' => 'neutralisé ',
                    'Paralysé ' => 'paralysé ',
                ]
            ])
            ->add('sens', ChoiceType::class, [
                'required' => false,
                'multiple' => true,
                'choices' => [
                    'Darkvision 9m' => 'vision dans le noir 9m',
                    'Darkvision 18m' => 'vision dans le noir 18m',
                    'Darkvision 36m' => 'vision dans le noir 36m',
                    'Blindvision 3m' => 'vision aveugle 3m',
                    'Blindvision 9m' => 'vision aveugle 9m',
                    'Blindvision 18m' => 'vision aveugle 18m',
                ]
            ])
            ->add('pp', IntegerType::class)
            ->add('pp2', TextType::class, [
                'required' => false
            ])
            ->add('language', TextType::class, [
                'required' => false,
            ])
            ->add('fp', NumberType::class, [
                'required' => false
            ])
            ->add('xp', NumberType::class, [
                'required' => false
            ])
            ->add('bm', TextType::class, [
                'required' => false
            ])
            ->add('touch_cac', TextType::class, [
                'required' => false
            ])
            ->add('range_cac', TextType::class, [
                'required' => false
            ])
            ->add('damage_cac', TextType::class, [
                'required' => false
            ])
            ->add('touch_range', TextType::class, [
                'required' => false
            ])
            ->add('range_range', TextType::class, [
                'required' => false
            ])
            ->add('damage_range', TextType::class, [
                'required' => false
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
            ->add('descr', TextareaType::class, [
                'required' => false
            ])
            ->add('skill', EntityType::class, [
                'class' => SpecialtySkill::class,
                'choice_label' => 'name',
                'required' => false,
                'group_by' => function($item) {
                    return $item->getSpecialty()[0]->getSlug();
                },
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SB::class
        ]);
    }
}