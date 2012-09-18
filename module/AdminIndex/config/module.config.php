<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'AdminIndex\Controller\Index' => 'AdminIndex\Controller\IndexController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'index' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin',
                    'defaults' => array(
                        'controller' => 'AdminIndex\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'index' => __DIR__ . '/../view',
        ),
    ),
);