<?php

namespace Tasks\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tasks\Model\Tasks;
use Tasks\Form\TasksForm;

class TasksController extends AbstractActionController
{
    protected $tasksTable;
    
    public function indexAction()
    {
        return new ViewModel(array(
            'tasks' => $this->getTasksTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
        $form = new TasksForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $tasks = new Tasks();
            $form->setInputFilter($tasks->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $tasks->exchangeArray($form->getData());
                $this->getTasksTable()->saveTask($tasks);

                // Redirect to list of tasks
                return $this->redirect()->toRoute('tasks');
            }
        }
        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('tasks', array(
                'action' => 'add'
            ));
        }
        $task = $this->getTaskTable()->getTask($id);

        $form  = new TaskForm();
        $form->bind($task);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($task->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getTaskTable()->saveTask($task);

                // Redirect to list of tasks
                return $this->redirect()->toRoute('task');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('task');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getTaskTable()->deleteTask($id);
            }

            // Redirect to list of tasks
            return $this->redirect()->toRoute('task');
        }

        return array(
            'id'    => $id,
            'task' => $this->getTaskTable()->getTask($id)
        );
    }
    
    public function getTaskTable()
    {
        if (!$this->taskTable) {
            $sm = $this->getServiceLocator();
            $this->taskTable = $sm->get('Task\Model\TaskTable');
        }
        return $this->taskTable;
    }
}