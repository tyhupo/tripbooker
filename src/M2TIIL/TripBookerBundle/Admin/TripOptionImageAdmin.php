<?php 
namespace M2TIIL\TripBookerBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper; 
use Sonata\AdminBundle\Form\FormMapper;

class TripOptionImageAdmin extends Admin
{
    protected $baseRouteName = 'pictures_admin';
    protected $baseRoutePattern = 'pictures_admin';
    protected $translationDomain = 'messages';
    const WEB_ROOT_DIR_PATH = '/'; // ../../../../../web/

    protected function configureFormFields(FormMapper $formMapper)
    {
        if ($this->hasParentFieldDescription()) { 
            $getter = 'get' . $this->getParentFieldDescription()->getFieldName();
            $parent = $this->getParentFieldDescription()->getAdmin()->getSubject();
            if ($parent) {
              $image = $parent->$getter();
            } else {
              $image = null;
            }
        } 
        else { 
            $image = $this->getSubject();
        }

        // Show a thumbnail in the help
        $fileFieldOptions = array('required' => false, 'label' => false);
        if ($image && ($webPath = $image->getWebPath())) {
            $fileFieldOptions['help'] = '<img src="'.self::WEB_ROOT_DIR_PATH.$webPath.'" class="admin-preview" />';
        }

        $formMapper
            ->add('file','file', $fileFieldOptions);
    }

    /**
     * Liste des images
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id', null, array(
                'label' => 'Image',
                'template' => 'M2TIILTripBookerBundle:CRUD:picture.html.twig',
            ))
            ->add('url', null, array(
                'label' => 'Url',
                'template' => 'M2TIILTripBookerBundle:CRUD:picture_url.html.twig',
            ))
        ;
    }
}
