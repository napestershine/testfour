<?php
namespace Bizz\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SelectUserType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('usertype', ChoiceType::class, array(
                'choices' => array(
                    'i' => 'Individual',
                    'c' => 'Company'
                ),
                'required' => true
            ))
            ->add('category', EntityType::class, array(
                'class' => 'Bizz\AdminBundle:CompCat',
                'label' => 'Select Category',
                'placeholder' => '-- Select Category --',
                'choice_label' => 'category',
                'required' => true
            ))
            ->add('category', EntityType::class, array(
                'class' => 'Bizz\AdminBundle:Icat',
                'label' => 'Select Category',
                'placeholder' => '-- Select Category --',
                'choice_label' => 'category',
                'required' => true
            ));
    }

    public function getBlockPrefix()
    {
        return 'SelectUserType';
    }

}