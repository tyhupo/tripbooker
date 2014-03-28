<?php

namespace M2TIIL\TripBookerBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class TripAdmin extends Admin
{
	// Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Titre'))
            ->add('startDate', 'date', array(
                'label' => 'Date de début',
                'format' => 'ddMMyyyy',
            ))
            ->add('endDate', 'date', array(
                'label' => 'Date de fin',
                'format' => 'ddMMyyyy',                
            ))
            ->add('text', 'textarea', array(
                'label' => 'Texte', 
                'attr' => array(
                    'rows' => 10,
                    'cols' => 50,
                ),
            ))
            ->add('price', 'number', array(
                'label' => 'Prix',
            ))
            ->add('categories', 'sonata_type_model', array(
                'label' => 'Catégories',
                'class' => 'M2TIILTripBookerBundle:TripCategory',
                'expanded' => false,
                'multiple' => true,
            ))
            ->add('conveyances', 'sonata_type_model', array(
                'label' => 'Moyens de transports',
                'class' => 'M2TIILTripBookerBundle:Conveyance',
                'expanded' => false,
                'multiple' => true,
            ))
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
            ->addIdentifier('title')
        ;
    }
}