<?php

namespace Tasks\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tasks\Entity\TaskEntity;
use Tasks\Entity\PriorityEntity;
use Tasks\Form\AddEditTaskForm;
//use Tasks\Form\TasksForm;

class AddEditController extends AbstractActionController
{
    protected $tasksTable;
    protected $addEditTaskForm;
    
    public function init()
    {
        $this->form = $this->getAddEditTaskForm();
        $this->entity = new TaskEntity();
        $this->form->bind($this->entity);
    }
    
    public function addAction()
    {
        $this->init();
        
        if($this->getRequest()->isPost()) {
            $this->form->setData($this->request->getPost());
            
            \Zend\Debug\Debug::dump($this->entity);

            if ($form->isValid()) {
                var_dump($this->entity);
            }
        }
        return new ViewModel(array(
            'addEditTaskForm' => $this->form,
        ));
    }
    
    public function editAction()
    {
        $this->init();
        
        if($this->getRequest()->isPost()) {
            $this->form->setData($this->request->getPost());
            
            \Zend\Debug\Debug::dump($this->entity);

            if ($form->isValid()) {
                var_dump($this->entity);
            }
        } else {
            
        }
        
        return new ViewModel(array(
            'addEditTaskForm' => $this->form,
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
