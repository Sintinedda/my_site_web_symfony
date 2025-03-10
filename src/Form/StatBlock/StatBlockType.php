<?php

namespace App\Form\StatBlock;

use App\Entity\Specialty\SpecialtySkill;
use App\Entity\StatBlock\StatBlock;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
            ->add('pp', TextType::class)
            ->add('sens', ChoiceType::class, [
                'required' => false,
                'multiple' => true,
                'choices' => [
                    'Darkvision 18m' => 'vision dans le noir 18m',
                ]
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
            ->add('touchWeaponCac', TextType::class, [
                'required' => false
            ])
            ->add('rangeWeaponCac', TextType::class, [
                'required' => false
            ])
            ->add('damageWeaponCac', TextType::class, [
                'required' => false
            ])
            ->add('specialty_skill', EntityType::class, [
                'class' => SpecialtySkill::class,
                'choice_label' => 'name',
                'required' => false,
                'group_by' => function($item) {
                    return $item->getSpecialty()[0]->getSlug();
                },
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
