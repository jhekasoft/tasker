<?php

namespace Tasks\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tasks\Entity\TaskEntity;
use Tasks\Entity\PriorityEntity;
use Tasks\Form\AddEditTaskForm;
//use Tasks\Form\TasksForm;

class AddEditTasksController extends AbstractActionController
{
    protected $tasksTable;
    protected $form;
    
    public function init()
    {
        //$form = $this->getAddEditTaskForm();
        //$this->taskEntity = new TaskEntity();
        //$form->bind($this->taskEntity);
    }
    
    public function editAction()
    {
        $this->init();
        
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('Tasks\tasks-add');
        }
        
        $form = $this->getForm();
        
        if($this->getRequest()->isPost()) {
            // Сохраняем форму
            // taskEntity - пустой объект
            $entity = new TaskEntity();
            $form->bind($entity);
            $form->setInputFilter($entity->getInputFilter());
            $form->setData($this->getRequest()->getPost());
            
            if ($form->isValid()) {
                $this->getTasksTable()->save($entity);

                // Redirect to list of albums
                return $this->redirect()->toRoute('Tasks\index');
            }
        } else {
            $entity = $this->getTasksTable()->getItem($id);
            $form->bind($entity);
        }
        
        return new ViewModel(array(
            'addEditTaskForm' => $form,
        ));
    }
    
    public function addAction()
    {
        $this->init();
        
        $form = $this->getForm();
        
        if($this->getRequest()->isPost()) {
            // Сохраняем форму
            // taskEntity - пустой объект
            $entity = new TaskEntity(array(
                'hydrator' => $this->getTasksTable()->getResultSetPrototype()->getHydrator()
            ));
            $form->bind($entity);
            $form->setInputFilter($entity->getInputFilter());
            $form->setData($this->getRequest()->getPost());
            
            if ($form->isValid()) {
                //\Zend\Debug\Debug::dump($entity);
                $entity->creation_time = date('Y-m-d H:i:s', time());
                $this->getTasksTable()->save($entity);

                // Redirect to list of albums
                return $this->redirect()->toRoute('Tasks\index');
            }
        }
        
        return new ViewModel(array(
            'addEditTaskForm' => $form,
        ));
    }
    
    public function doneAction()
    {
        $this->init();
        
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            $this->flashmessenger()->addMessage("id not specified");
            return $this->redirect()->toRoute('Tasks\index');
        }
        
        $entity = $this->getTasksTable()->getTask($id);
        $entity->done = 1;
        $entity->done_time = date('Y-m-d H:i:s', time());
        
        $this->getTasksTable()->save($entity);
        
        $this->flashmessenger()->addMessage("done");
        return $this->redirect()->toRoute('Tasks\index');
    }
    
    public function getForm()
    {
        if (!$this->form) {
            $sm = $this->getServiceLocator();
            $this->form = $sm->get('Tasks\Form\AddEditTaskForm');
        }
        return $this->form;
    }
    
    public function getTasksTable()
    {
        if (!$this->tasksTable) {
            $sm = $this->getServiceLocator();
            $this->tasksTable = $sm->get('Tasks\Model\TasksTable');
        }
        return $this->tasksTable;
    }
    
//    public function addAction()
//    {
//        $form = new AlbumForm();
//        $form->get('submit')->setValue('Add');
//
//        $request = $this->getRequest();
//        if ($request->isPost()) {
//            $album = new Album();
//            $form->setInputFilter($album->getInputFilter());
//            $form->setData($request->getPost());
//
//            if ($form->isValid()) {
//                $album->exchangeArray($form->getData());
//                $this->getAlbumTable()->saveAlbum($album);
//
//                // Redirect to list of albums
//                return $this->redirect()->toRoute('album');
//            }
//        }
//        return array('form' => $form);
//    }
//
//    public function editAction()
//    {
//        $id = (int) $this->params()->fromRoute('id', 0);
//        if (!$id) {
//            return $this->redirect()->toRoute('album', array(
//                'action' => 'add'
//            ));
//        }
//        $album = $this->getAlbumTable()->getAlbum($id);
//
//        $form  = new AlbumForm();
//        $form->bind($album);
//        $form->get('submit')->setAttribute('value', 'Edit');
//
//        $request = $this->getRequest();
//        if ($request->isPost()) {
//            $form->setInputFilter($album->getInputFilter());
//            $form->setData($request->getPost());
//
//            if ($form->isValid()) {
//                $this->getAlbumTable()->saveAlbum($album);
//
//                // Redirect to list of albums
//                return $this->redirect()->toRoute('album');
//            }
//        }
//
//        return array(
//            'id' => $id,
//            'form' => $form,
//        );
//    }
//
//    public function deleteAction()
//    {
//        $id = (int) $this->params()->fromRoute('id', 0);
//        if (!$id) {
//            return $this->redirect()->toRoute('album');
//        }
//
//        $request = $this->getRequest();
//        if ($request->isPost()) {
//            $del = $request->getPost('del', 'No');
//
//            if ($del == 'Yes') {
//                $id = (int) $request->getPost('id');
//                $this->getAlbumTable()->deleteAlbum($id);
//            }
//
//            // Redirect to list of albums
//            return $this->redirect()->toRoute('album');
//        }
//
//        return array(
//            'id'    => $id,
//            'album' => $this->getAlbumTable()->getAlbum($id)
//        );
//    }
}














        //$album = $this->getAlbumTable()->getAlbum($id);
        
//        \Zend\Debug\Debug::dump($this->getRequest()->getQuery());
//        \Zend\Debug\Debug::dump($this->getRequest()->getUri());
//        \Zend\Debug\Debug::dump($this->getRequest()->getUriString());
//        \Zend\Debug\Debug::dump($this->params()->fromRoute());
//        \Zend\Debug\Debug::dump($this->params()->fromQuery());
//        \Zend\Debug\Debug::dump($this->params()->fromHeader());
//        \Zend\Debug\Debug::dump($this->params()->fromFiles());
//        exit();
        
