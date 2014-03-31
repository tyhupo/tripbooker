<?php

namespace M2TIIL\TripBookerBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class TripStepAdmin extends Admin
{
	// Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Titre'))
            ->add('text', 'textarea', array(
                'label' => 'Texte', 
                'attr' => array(
                    'rows' => 10,
                    'cols' => 50,
                ),
            ))
            ->add('startCity', 'text', array('label' => 'Ville de départ'))
            ->add('endCity', 'text', array('label' => "Ville d'arrivée"))
            ->add('startDate', 'date', array(
                'label' => 'Date de début',
                'format' => 'ddMMyyyy',
                'data' => new \DateTime(),   
            ))
            ->add('endDate', 'date', array(
                'label' => 'Date de fin',
                'format' => 'ddMMyyyy',
                'data' => new \DateTime(),         
            ))
            ->add('price', 'number', array(
                'label' => 'Prix',
            ))
            ->add('image', 'sonata_type_admin', array(
                'label' => 'Image',
                'required' => false,
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
            ->addIdentifier('title')
        ;
    }
}