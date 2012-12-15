<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Diary\Controller\Index' => 'Diary\Controller\IndexController',
            'Diary\Controller\AddEditNotes' => 'Diary\Controller\AddEditNotesController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'Diary\index' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '[/:lang]/diary[/:page][/]',
                    'constraints' => array(
                        'lang' => '[a-zA-Z]{2}',
                        'page'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Diary\Controller\Index',
                        'action'     => 'index',
                        'page'     => '1',
                    ),
                ),
            ),
            'Diary\add-note' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '[/:lang]/diary/add',
                    'constraints' => array(
                        'lang' => '[a-zA-Z]{2}',
                    ),
                    'defaults' => array(
                        'controller' => 'Diary\Controller\AddEditNotes',
                        'action'     => 'add',
                    ),
                ),
            ),
            'Diary\edit-note' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '[/:lang]/diary/edit[/:id][/:url]',
                    'constraints' => array(
                        'lang' => '[a-zA-Z]{2}',
                        'id' => '[0-9]+',
                        'url' => '[a-zA-Z0-9_-]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Diary\Controller\AddEditNotes',
                        'action'     => 'edit',
                    ),
                ),
            ),
        ),
    ),
);
