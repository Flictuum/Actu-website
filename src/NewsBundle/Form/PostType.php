<?php

namespace NewsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, ['label' => 'news.add_post.form.title'])
            ->add('content', TextareaType::class, ['label' => 'news.add_post.form.content'])
            ->add('save', SubmitType::class, ['label' => 'news.add_post.form.save']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'NewsBundle\Entity\Post',
        ]);
    }

    public function getBlockPrefix()
    {
        return 'news_bundle_comment_type';
    }
}
