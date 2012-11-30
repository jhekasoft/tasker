<?php

namespace Tasks\Controller;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tasks\Entity\TaskEntity;
use Tasks\Entity\PriorityEntity;
use Tasks\Model\TasksTable;
use Tasks\Form\AddEditTaskForm;




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
        
        $table = $this->services->get('Tasks\Model\TasksTable');
        
//        foreach($table->select("`done`='0'") as $task) {
//            \Zend\Debug\Debug::dump($task);
//        }
//        
//        \Zend\Debug\Debug::dump('123');exit();
        
        
        return new ViewModel(array(
            'resultSet' => $table->select("`done`='0'"),
        ));
    }
}