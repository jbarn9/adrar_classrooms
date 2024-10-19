<?php

namespace App\Form;

use App\Entity\Chapters;
use App\Entity\Courses;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormTypeInterface;

class ChaptersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, [
                'label' => 'Titre',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Titre du chapitre']
            ])
            ->add('subtitle', null, [
                'label' => 'Sous-titre',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Sous-titre du chapitre']
            ])
            ->add('content', null, [
                'label' => 'Contenu',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Contenu du chapitre']
            ])
            ->add('course', EntityType::class, [
                'label' => 'Cours associé',
                'class' => Courses::class,
                'choice_label' => 'title',
                'attr' => ['class' => 'form-control']
            ])
            ->add('posted', CheckboxType::class, [
                'label' => 'poster?',
                'attr' => [
                    'class' => 'toggle-input',
                    'id' => 'toggle'
                ],
                'required' => false,
                'data' => $options['data']->isPosted(),
            ])
            ->add('finished', CheckboxType::class, [
                'label' => 'validé?',
                'required' => false,
                'data' => $options['data']->isFinished()
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chapters::class,
        ]);
    }
}
