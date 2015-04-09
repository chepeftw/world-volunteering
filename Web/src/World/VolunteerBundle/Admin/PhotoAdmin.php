<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace World\VolunteerBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PhotoAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->add('title', 'text', array('label' => 'Post Title'))
//            ->add('author', 'entity', array('class' => 'Acme\DemoBundle\Entity\User'))
            ->add('name')
            ->add('description')
            ->add('image', 'file', array('required' => false, 'data_class' => null, 'mapped' => true))
            ->add('association')
            ->add('orderNumber')
            ->add('enabled')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('description')
            ->add('association')
            ->add('enabled')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('description')
            ->add('image', null, array(
                'template' => 'WorldToolBundle:Admin:image.html.twig'
            ))
            ->add('association')
            ->add('orderNumber')
            ->add('enabled')
        ;
    }

    public function prePersist($object)
    {
        // We get the uploadable manager!
        $uploadableManager = $this->getConfigurationPool()->getContainer()->get('stof_doctrine_extensions.uploadable.manager');
        $uploadableManager->markEntityToUpload($object, $object->getImage());
    }

    public function preUpdate($object)
    {
        // We get the uploadable manager!
        $uploadableManager = $this->getConfigurationPool()->getContainer()->get('stof_doctrine_extensions.uploadable.manager');
        $uploadableManager->markEntityToUpload($object, $object->getImage());
    }
}