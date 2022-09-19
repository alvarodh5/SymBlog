<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Post;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Validator\Constraints\Image;


class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => "WEBSITE TITLE",
                'attr' => ['class' => 'form-control text-box single-line', 'placeholder' => 'Titulo']
            ])
            ->add('imageFile', VichFileType::class, [
                'label' => "Image post",
                'attr' => ['class' => 'form-control text-box single-line', 'placeholder' => 'Image Post', 'accept' => "image/*"],
                'constraints' => [
                    new Image()
                ]
            ])
            ->add('category', EntityType::class, [
                'label' => "POST CATEGORY",
                'class' => Category::class,
                'attr' => ['class' => 'form-control text-box single-line'],
                'choice_label' => function (Category $category) {
                    return $category->getName();
                }
            ])
            ->add('content', TextareaType::class, [
                'label' => false,
                'required' => false,
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Create",
                'attr' => ['class' => 'btn btn-success btn-fill pull-right']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
