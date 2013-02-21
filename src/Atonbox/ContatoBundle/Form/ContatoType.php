<?php

namespace Atonbox\ContatoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContatoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('num_seq')
            ->add('nome')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Atonbox\ContatoBundle\Entity\Contato'
        ));
    }

    public function getName()
    {
        return 'atonbox_contatobundle_contatotype';
    }
}
