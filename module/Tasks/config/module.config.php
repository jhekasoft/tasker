<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Tasks\Controller\Index' => 'Tasks\Controller\IndexController',
            'Tasks\Controller\AddEditTasks' => 'Tasks\Controller\AddEditTasksController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
//        'template_map'  => array(
//            'tasks/index/index' => '/home/bondvt04/www/tasker/module/Tasks/view/tasks/index/index.phtml',
//        ),
    ),
    'router' => array(
        'routes' => array(
            'Tasks\index' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '[/:lang]/tasks[/:page][/]',
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
                    'route'    => '[/:lang]/tasks/add',
                    'constraints' => array(
                        'lang' => '[a-zA-Z]{2}',
                    ),
                    'defaults' => array(
                        'controller' => 'Tasks\Controller\AddEditTasks',
                        'action'     => 'add',
                    ),
                ),
            ),
            'Tasks\edit-task' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '[/:lang]/tasks/edit[/:id][/:url]',
                    'constraints' => array(
                        'lang' => '[a-zA-Z]{2}',
                        'id' => '[0-9]+',
                        'url' => '[a-zA-Z0-9_-]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Tasks\Controller\AddEditTasks',
                        'action'     => 'edit',
                    ),
                ),
            ),
            'Tasks\done-task' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '[/:lang]/tasks/done[/:id][/:url]',
                    'constraints' => array(
                        'lang' => '[a-zA-Z]{2}',
                        'id' => '[0-9]+',
                        'url' => '[a-zA-Z0-9_-]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Tasks\Controller\AddEditTasks',
                        'action'     => 'done',
                    ),
                ),
            ),
        ),
    ),
);