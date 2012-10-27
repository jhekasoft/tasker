<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Tasks\Controller\Tasks' => 'Tasks\Controller\TasksController',
        ),
    ),
    'router' => array(
        'routes' => array(
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