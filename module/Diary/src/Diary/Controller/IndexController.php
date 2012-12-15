<?php

namespace Diary\Controller;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\Sql\Select;
use Diary\Entity\NoteEntity;
use Diary\Model\NotesTable;
use Diary\Form\AddEditNoteForm;




class IndexController extends AbstractActionController implements ServiceLocatorAwareInterface
{
    protected $services;

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->services = $serviceLocator;
    }
    
    public function init()
    {
        
    }
    
    public function indexAction()
    {
        //\Zend\Debug\Debug::dump('zlo');exit();
        $this->init();
        
        $table = $this->services->get('Diary\Model\NotesTable');
        
        //\Zend\Debug\Debug::dump($table);exit();
        
        return new ViewModel(array(
            'resultSet' => $table->select(function (Select $select) {
                $select->order('day DESC');
            }),
        ));
    }
}