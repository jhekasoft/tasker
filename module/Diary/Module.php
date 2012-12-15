<?php

namespace Diary;

use Diary\Model\NotesTable;
use Diary\Form\AddEditNoteForm;

class Module
{
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Diary\Model\NotesTable' => function($sm) {
                    // тянем общий адаптер, хотя можем взять и конкретный
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new NotesTable($dbAdapter);

                    return $table;
                },
                'Diary\Form\AddEditNoteForm' => function($sm) {
                    $form = new AddEditNoteForm();

                    return $form;
                },
            ),
        );
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}
