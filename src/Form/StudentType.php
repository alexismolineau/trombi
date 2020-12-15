<?php

namespace App\Form;

use App\Entity\Student;
use App\Entity\Promotion;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom', TextType::class, ['required' => true])
            ->add('nom', TextType::class, ['required' => true])
            ->add('age', NumberType::class, ['required' => false])
            ->add('mission', TextareaType::class, ['required' => false])
            ->add('background', TextareaType::class, ['required' => false])
            ->add('imgSrc', FileType::class, [
                'required' => false,
                'data_class' => null,
                ])
            ->add('film', TextType::class, ['required' => false])
            ->add('serie', TextType::class, ['required' => false])
            ->add('jv', TextType::class, ['required' => false])
            ->add('hero', TextType::class, ['required' => false])
            ->add('livre', TextType::class, ['required' => false])
            ->add('chanson', TextType::class, ['required' => false])
            ->add('application', TextType::class, ['required' => false])
            ->add('site', TextType::class, ['required' => false])
            ->add('langage', TextType::class, ['required' => false])
            ->add('slack', TextType::class, ['required' => false])
            ->add('company', TextType::class, ['required' => false])
            ->add('student', ChoiceType::class, [
                'choices' => [
                    'etudiant' => 'student',
                    'enseignant' => 'teacher',
                ],
                'expanded' => true,
                'required' => true,
            ])
            ->add('promotions', EntityType::class, [
                'class' => Promotion::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => false,
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
