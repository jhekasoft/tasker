<?php

namespace Tasks\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tasks\Entity\TaskEntity;
use Tasks\Entity\PriorityEntity;
use Tasks\Model\TasksTable;
use Tasks\Form\AddEditTaskForm;


class IndexController extends AbstractActionController
{
    protected $tasksTable = null;
    protected $addEditTaskForm = null;
    
    public function init()
    {
        
    }
    
    public function indexAction()
    {
        $this->init();
        
        $table = $this->getTasksTable();
        $resultSet = $table->fetchAll();
        //exit();
        //\Zend\Debug\Debug::dump();exit();
        return new ViewModel(array(
            'resultSet' => $resultSet,
        ));
    }
    
    public function getTasksTable()
    {
        if(null === $this->tasksTable) {
            $this->tasksTable = new TasksTable($this->getServiceLocator()->get('Zend\Db\Adapter\Adapter'));
        }
        return $this->tasksTable;
    }
    
}