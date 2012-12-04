<?php

namespace Tasks\Controller;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\Sql\Select;
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
        
        return new ViewModel(array(
            'resultSet' => $table->select(function (Select $select) {
                $select->where("`done`='0'");
                $select->order('creation_time DESC');
            }),
        ));
    }
}