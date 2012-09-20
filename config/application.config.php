<?php

return array(
    'modules' => array(
        'Application',
        'Album',
        'AdminIndex',
        'AdminCommon',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
);
