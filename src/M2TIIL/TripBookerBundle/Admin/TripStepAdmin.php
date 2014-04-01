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
            ->add('endCity', 'text', array('label' => "Ville d'arrivée"));

        if ($this->id($this->getSubject())) {
            $formMapper
                ->add('startDate', 'date', array(
                    'label' => 'Date de début',
                    'format' => 'ddMMyyyy',
                ))
                ->add('endDate', 'date', array(
                    'label' => 'Date de fin',
                    'format' => 'ddMMyyyy',
                ))
            ;
        }
        else {
            $formMapper
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
            ;
        }

        $formMapper
            ->add('price', 'number', array(
                'label' => 'Prix',
            ))
            ->add('startStep', 'checkbox', array(
                'label' => 'Première étape du voyage',
                'required' => false,
            ))
            ->add('endStep', 'checkbox', array(
                'label' => "Dernière étape du voyage",
                'required' => false,
            ))
            ->add('conveyances', 'sonata_type_model', array(
                'label' => 'Moyens de transports',
                'class' => 'M2TIILTripBookerBundle:Conveyance',
                'expanded' => false,
                'multiple' => true,
            ))
            ->add('conveyancesOptions', 'sonata_type_model', array(
                'label' => 'Options des moyens de transport',
                'class' => 'M2TIILTripBookerBundle:ConveyanceOption',
                'expanded' => false,
                'multiple' => true,
                'required' => false,
            ))  
            ->add('options', 'sonata_type_model', array(
                'label' => 'Options du voyage',
                'class' => 'M2TIILTripBookerBundle:TripOption',
                'expanded' => false,
                'multiple' => true,
                'required' => false,
            ))
            ->add('hotels', 'sonata_type_model', array(
                'label' => 'Hôtels',
                'class' => 'M2TIILTripBookerBundle:Hotel',
                'expanded' => false,
                'multiple' => true,
                'required' => false,
            ))
            ->add('guidedTours', 'sonata_type_model', array(
                'label' => 'Excursions',
                'class' => 'M2TIILTripBookerBundle:GuidedTour',
                'expanded' => false,
                'multiple' => true,
                'required' => false,
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
            ->add('startCity', 'text', array('label' => 'Ville de départ'))
            ->add('endCity', 'text', array('label' => "Ville d'arrivée"))
            ->add('startDate', 'date', array(
                'label' => 'Date de début',
                'format' => 'd/m/Y',
            ))
            ->add('endDate', 'date', array(
                'label' => 'Date de fin',
                'format' => 'd/m/Y',
            ))
            ->add('price', null, array(
                'label' => 'Prix',
                'template' => 'M2TIILTripBookerBundle:CRUD:trip-price.html.twig',
            ))
        ;
    }
}