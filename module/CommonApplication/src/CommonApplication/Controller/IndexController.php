<?php

namespace CommonApplication\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tasks\Model\TaskModel;
//use Tasks\Form\TasksForm;

class IndexController extends AbstractActionController
{
    protected $tasksTable;
    
    public function indexAction()
    {
        $taskModel = new TaskModel();
        $tasksTable = $this->getTasksTable();
        $tasksTable->getOlolo();
//        \Zend\Debug\Debug::dump($tasksTable->getOlolo()->current());
//        \Zend\Debug\Debug::dump($tasksTable->fetchAll()->current());
//        \Zend\Debug\Debug::dump($tasksTable->fetchAll()->current()->getArrayCopy());
        $tasksTable->addColumn(array(
            'columnName' => 'hello3',
            'columnType' => 'varchar (255)',
        ));
        exit();
        return new ViewModel();
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
