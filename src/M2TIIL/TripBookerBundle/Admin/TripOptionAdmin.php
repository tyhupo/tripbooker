<?php

namespace M2TIIL\TripBookerBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class TripOptionAdmin extends Admin
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
            ->add('price', 'number', array(
                'label' => 'Prix',
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
            ->add('text', null, array('label' => 'Texte'))
            ->add('price', null, array(
                'label' => 'Prix',
                'template' => 'M2TIILTripBookerBundle:CRUD:trip-price.html.twig',
            ))
        ;
    }

    public function prePersist($object)
    {
        foreach ($object->getImages() as $image) {
            if ($image->getUri() == null) {
                $object->removeImage($image);
            }
        }
    }
}