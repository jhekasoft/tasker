<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Tasks\Controller\Index' => 'Tasks\Controller\IndexController',
            'Tasks\Controller\AddEdit' => 'Tasks\Controller\AddEditController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'tasks' => __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'Tasks\index' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '[/:lang]/tasks[/:page]',
                    'constraints' => array(
                        'lang' => '[a-zA-Z]{2}',
                        'page'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Tasks\Controller\Index',
                        'action'     => 'index',
                        'page'     => '1',
                    ),
                ),
            ),
            'Tasks\add-task' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => 'add-task',
                    'defaults' => array(
                        'controller' => 'Tasks\Controller\AddEdit',
                        'action'     => 'add',
                    ),
                ),
            ),
            'Tasks\edit-task' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => 'edit-task[/:id][/:url]',
                    'defaults' => array(
                        'id' => '[0-9]+',
                        'url' => '[a-zA-Z0-9_-]+',
                        'controller' => 'Tasks\Controller\AddEdit',
                        'action'     => 'edit',
                    ),
                ),
            ),
        ),
    ),
);