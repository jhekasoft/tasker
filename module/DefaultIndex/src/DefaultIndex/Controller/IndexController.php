<?php

namespace DefaultIndex\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tasks\Model\TaskModel;
use Tasks\Model\PriorityModel;
use Tasks\Form\AddEditTaskForm;
//use Tasks\Form\TasksForm;

class IndexController extends AbstractActionController
{
    protected $tasksTable;
    protected $addEditTaskForm;
    
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function addAction()
    {
        $form = $this->getAddEditTaskForm();
        \Zend\Debug\Debug::dump($form);exit();
        return new ViewModel();
    }
    
    public function getAddEditTaskForm()
    {
        if (!$this->addEditTaskForm) {
            $this->addEditTaskForm = new AddEditTaskForm();
        }
        return $this->addEditTaskForm;
    }
    
    public function getTasksTable()
    {
        if (!$this->tasksTable) {
            $sm = $this->getServiceLocator();
            $this->tasksTable = $sm->get('Tasks\Model\TasksTable');
        }
        return $this->tasksTable;
    }
}
