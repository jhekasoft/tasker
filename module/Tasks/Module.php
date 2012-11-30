<?php

namespace Tasks;

use Tasks\Model\TasksTable;
use Tasks\Model\TasksTagsTable;
use Tasks\Model\TagsTable;
use Tasks\Model\PrioritiesTable;
use Tasks\Form\AddEditTaskForm;

class Module
{
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Tasks\Model\TasksTable' => function($sm) {
                    // тянем общий адаптер, хотя можем взять и конкретный
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new TasksTable($dbAdapter);
                    $table->setDependentModels(array(
                        'tags' => $sm->get('Tasks\Model\TasksTagsTable'),
                    ));
                    return $table;
                },
                'Tasks\Model\TasksTagsTable' => function($sm) {
                    // тянем общий адаптер, хотя можем взять и конкретный
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new TasksTagsTable($dbAdapter);
                    $table->setDependentModels(array(
                        'tags' => $sm->get('Tasks\Model\TagsTable'),
                    ));
                    return $table;
                },
                'Tasks\Model\TagsTable' => function($sm) {
                    // тянем общий адаптер, хотя можем взять и конкретный
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new TagsTable($dbAdapter);
                    return $table;
                },
                'Tasks\Model\PrioritiesTable' => function($sm) {
                    // тянем общий адаптер, хотя можем взять и конкретный
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new PriorityTable($dbAdapter);
                    return $table;
                },
                'Tasks\Form\AddEditTaskForm' => function($sm) {
                    $form = new AddEditTaskForm();
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