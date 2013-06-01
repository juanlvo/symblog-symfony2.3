<?php


namespace Blogger\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


/**
 * Description of EnquiryType
 *
 * @author juanlvo
 */
class EnquiryType extends AbstractType
{
    /**
     * Method for build the form
     * 
     * @param \Symfony\Component\Form\FormBuilder $builder object builder
     * @param array                               $options array with options
     * @return nothing
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('email', 'email');
        $builder->add('subject');
        $builder->add('body', 'textarea');
    }

    /**
     * Method for get the name of the form
     * 
     * @return string
     */
    public function getName()
    {
        return 'contact';
    }
}
