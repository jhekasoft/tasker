<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Tasks\Controller\Tasks' => 'Tasks\Controller\TasksController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'Tasks/index' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '[/:lang]/tasks[/:page]',
                    'constraints' => array(
                        'lang' => '[a-zA-Z]{2}',
                        'page'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Tasks\Controller\Tasks',
                        'action'     => 'index',
                        'page'     => '1',
                    ),
                ),
            ),
            'tasks' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/tasks[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Tasks\Controller\Tasks',
                        'action'     => 'index',
                    ),
                ),
            ),
            'tasks-add' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/tasks/add',
                    'defaults' => array(
                        'controller' => 'Tasks\Controller\AddEdit',
                        'action'     => 'add',
                    ),
                ),
            ),
            'tasks-edit' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/tasks/edit/:id',
                    'defaults' => array(
                        'controller' => 'Tasks\Controller\AddEdit',
                        'action'     => 'edit',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Tasks\Controller\AddEdit' => 'Tasks\Controller\AddEditController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'tasks' => __DIR__ . '/../view',
        ),
    ),
);