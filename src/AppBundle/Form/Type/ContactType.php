<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Contact type class.
 *
 * @author Pablo diaz 
 */
class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('name', 'text',  ['label' => 'Name',
                'attr' => ['placeholder' => 'Name','class' => 'form-control'],
                ])
            ->add('email',     'email', ['label' => 'Email',
                'attr' => ['placeholder' => 'Email','class' => 'form-control'],
                ])
            ->add('subject', 'text', ['label' => 'Subject',
                'attr' => ['placeholder' => 'Subject','class' => 'form-control'],
                ])
            ->add('message', 'textarea', ['label' => 'Message',
                'attr' => ['placeholder' => 'Message','class' => 'form-control'],
                ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
        'data_class' => 'AppBundle\Entity\Contact',
    ));
    }

    public function getName()
    {
        return 'contact_type';
    }
}
