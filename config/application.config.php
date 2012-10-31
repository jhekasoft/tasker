<?php

return array(
    'modules' => array(
        'CommonApplication',
        'DefaultIndex',
        'Tasks',
        'Console',
        'Tags',
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
