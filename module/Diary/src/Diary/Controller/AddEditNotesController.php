<?php

namespace Diary\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Diary\Entity\NoteEntity;
use Diary\Form\AddEditNoteForm;

class AddEditNotesController extends AbstractActionController
{
    protected $notesTable;
    protected $form;

    public function init()
    {

    }

    public function editAction()
    {
        $this->init();

        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('Diary\notes-add');
        }

        $form = $this->getForm();

        if ($this->getRequest()->isPost()) {
            $entity = new NoteEntity(array(
                'hydrator' => $this->getNotesTable()->getResultSetPrototype()->getHydrator()
            ));
            $form->bind($entity);
            $form->setInputFilter($entity->getInputFilter());
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                $this->getNotesTable()->save($entity);

                // Redirect to list of albums
                return $this->redirect()->toRoute('Diary\index');
            }
        } else {
            $entity = $this->getNotesTable()->getItem($id);
            $form->bind($entity);
        }

        return new ViewModel(array(
            'addEditForm' => $form,
        ));
    }

    public function addAction()
    {
        $this->init();

        $form = $this->getForm();

        if ($this->getRequest()->isPost()) {
            $entity = new NoteEntity(array(
                'hydrator' => $this->getNotesTable()->getResultSetPrototype()->getHydrator()
            ));
            $form->bind($entity);
            $form->setInputFilter($entity->getInputFilter());
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                $entity->creation_time = date('Y-m-d H:i:s', time());
                $this->getNotesTable()->save($entity);

                // Redirect to list of albums
                return $this->redirect()->toRoute('Diary\index');
            }
        }

        return new ViewModel(array(
            'addEditForm' => $form,
        ));
    }

    public function getForm()
    {
        if (!$this->form) {
            $sm = $this->getServiceLocator();
            $this->form = $sm->get('Diary\Form\AddEditNoteForm');
        }

        return $this->form;
    }

    public function getNotesTable()
    {
        if (!$this->notesTable) {
            $sm = $this->getServiceLocator();
            $this->notesTable = $sm->get('Diary\Model\NotesTable');
        }

        return $this->notesTable;
    }

}
