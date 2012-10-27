<?php

namespace Tasks\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tasks\Model\TaskModel;
use Tasks\Model\PriorityModel;
use Tasks\Form\AddEditTaskForm;
//use Tasks\Form\TasksForm;

class AddEditController extends AbstractActionController
{
    protected $tasksTable;
    protected $addEditTaskForm;
    
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function addAction()
    {
        $addEditTaskForm = $this->getAddEditTaskForm();
        return new ViewModel(array(
            'addEditTaskForm' => $addEditTaskForm,
        ));
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
