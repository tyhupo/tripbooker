<?php

namespace M2TIIL\TripBookerBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ConveyanceAdmin extends Admin
{
	// Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Titre'))
            ->add('conveyancesOptions', 'sonata_type_model', array(
                'label' => 'Options',
                'class' => 'M2TIILTripBookerBundle:ConveyanceOption',
                'expanded' => false,
                'multiple' => true,
            ))            
        ;

        //die(count($object->getConveyancesOptions()));
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

    public function prePersist($object)
    {
        $this->preUpdate($project);
    }

    public function preUpdate($object)
    {
        // On met à jour la référence vers le moyen de transport en cours d'édition dans les options sélectionnées
        foreach ($object->getConveyancesOptions() as $option) {
            $option->setConveyance($object);
        }

        // Les options liées à ce moyen de transport qui ne le sont plus doivent être supprimées
        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();
        $conveyanceOptions = $em->getRepository('M2TIILTripBookerBundle:ConveyanceOption');
    }
}