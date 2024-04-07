<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class, ['label'  => 'To Be Completed Before: '])
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
        ;
    }

    public function configureOption(OptionsResolver $resolver):void{

        $resolver->setDefaults([
            'data_class' => Task::class,
            'csrf_protection' => false,
            // 'require_due_date' => false,
        ]);

        // $resolver->setAllowedTypes('require_due_date', 'bool');
    }
}


?>