<?php
return [
    'project' => [
        'name' => 'Cafe Wilhelm Sieben',
        'namespace' => 'Project'
    ],
    'template' => [
        'name' => 'cafe',
        'dir' =>  '/cafe',
        'cacheDir' => '/cache'
    ],
    /*'database' => [
        'host' => 'localhost',
        'user' => 'web28634274',
        'password' => 'q3qKQMpf',
        'database' => 'usr_web28634274_1'
    ],*/
    'database' => [
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'database' => 'cafe'
    ],
    'controller' => [
        'namespace' => 'Controller'
    ],
    'route' => [
        'index' => [
            'controller' => 'IndexController',
            'action' => 'indexAction'
        ],
        'notfound' => [
            'controller' => 'DefaultController',
            'action' => 'notFoundAction'
        ],
        'news' => [
            'controller' => 'IndexController',
            'action' => 'newsPageAction'
        ],
        'philosophie' => [
            'controller' => 'IndexController',
            'action' => 'philosophieAction'
        ],
        'anfahrt' => [
            'controller' => 'IndexController',
            'action' => 'anfahrtAction'
        ],
        'impressum' => [
            'controller' => 'IndexController',
            'action' => 'impressumAction'
        ],
        'archive' => [
            'controller' => 'IndexController',
            'action' => 'archiveAction'
        ]
    ],
    'slider' => [
        '/img/slider/teaser.jpg',
        '/img/slider/teaser2.jpg',
        '/img/slider/teaser3.jpg',
    ],
    'news' => [
        'minNewsShown' => 2,
        'maxAgeOfNewsInDays' => 5
    ]
];