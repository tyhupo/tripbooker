<?php

namespace M2TIIL\TripBookerBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ExcursionAdmin extends Admin
{
	// Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Titre'))
            ->add('place', 'text', array('label' => 'Endroit'))
            ->add('duration', 'text', array('label' => 'Durée'))
            ->add('text', 'textarea', array(
                'label' => 'Texte', 
                'attr' => array(
                    'rows' => 10,
                    'cols' => 50,
                ),
            ))
            ->add('image', 'sonata_type_admin', array(
                'label' => 'Image',
                //'required' => false,
            ), array('edit' => 'inline'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id', null, array(
                'label' => 'Image',
                'template' => 'M2TIILTripBookerBundle:CRUD:trip-picture.html.twig',
            )) 
            ->addIdentifier('title', null, array('label' => 'Titre'))
            ->add('place', 'text', array('label' => 'Endroit'))
            ->add('duration', 'text', array('label' => 'Durée'))
            ->add('text', null, array('label' => 'Texte'))
        ;
    }
}