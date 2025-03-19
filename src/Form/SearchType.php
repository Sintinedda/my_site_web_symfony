<?php

namespace App\Form;

use App\Data\SearchData;
use App\Entity\Classe\Classe;
use App\Entity\Spell\SpellSchool;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('classes', EntityType::class, [
                'label' => false,
                'class' => Classe::class,
                'multiple' => true,
                'choice_label' => 'name',
                'attr' => [
                    'size' => 8
                ],
                'choice_attr' => function () {
                    return [
                        'selected' => 'selected',
                        'class' => 'select-classe',
                        'onClick' => "unselect('select-classe')"
                    ];
                },
                'query_builder' => function(EntityRepository $er): QueryBuilder {
                    return $er->createQueryBuilder('c')
                        ->having('SIZE(c.spells) >= 1');
                }
            ])
            ->add('schools', EntityType::class, [
                'label' => false,
                'class' => SpellSchool::class,
                'multiple' => true,
                'choice_label' => 'name',
                'attr' => [
                    'size' => 8
                ],
                'choice_attr' => function () {
                    return [
                        'selected' => 'selected',
                        'class' => 'select-school',
                        'onClick' => "unselect('select-school')",
                    ];
                }
            ])
            ->add('sources', ChoiceType::class, [
                'label' => false,
                'multiple' => true,
                'choices' => [
                    'Manuel du joueur' => 'Manuel du Joueur',
                    'Le guide de Xanathar' => 'Le Guide de Xanathar',
                    'Arcanes Déterrés' => 'Arcanes Déterrés'
                ],
                'choice_attr' => function () { 
                    return [
                        'class' => 'select-source',
                        'onClick' => "unselect('select-source')",
                        'selected' => 'selected'
                    ];
                }
            ])
            ->add('min', ChoiceType::class, [
                'label' => 'Niv min',
                'choices' => [
                    0 => 0,
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5,
                    6 => 6,
                    7 => 7,
                    8 => 8,
                    9 => 9,
                ],
                'data' => 0,
                'choice_attr' => function (int $key) {
                    return [
                        'id' => 'min-'.$key
                    ];
                }
            ])
            ->add('max', ChoiceType::class, [
                'label' => 'Niv max',
                'choices' => [
                    0 => 0,
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5,
                    6 => 6,
                    7 => 7,
                    8 => 8,
                    9 => 9,
                ],
                'data' => 9,
                'choice_attr' => function (int $key) {
                    return [
                        'id' => 'max-'.$key
                    ];
                }
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}