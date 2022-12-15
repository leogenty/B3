<?php

namespace App\Form;

use App\Entity\Lessons;
use App\Entity\Matter;
use App\Repository\MatterRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;

class LessonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre de la leçon',
            ])
            ->add('desciption', TextareaType::class, [
                'label' => 'Description',
            ])
            ->add('position', IntegerType::class, [
                'label' => 'Numérotation',
            ])
            ->add('matter', EntityType::class, [
                'class' => Matter::class,
                'query_builder' => function (EntityRepository $er) use ($options) {
                    return $er->createQueryBuilder('matter')
                        ->where('matter.Title = :matterTitle')
                        ->setParameter(':matterTitle', $options['matterTitle']);
                },
                'choice_label' => function ($c) {
                    return $c->getTitle();
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lessons::class,
            'matterTitle' => null,
        ]);
    }
}
