<?php

$EM_CONF['ameos_dailymotion'] = [
    'title'            => 'Dailymotion online media service',
    'description'      => 'Dailymotion online media service',
    'category'         => 'misc',
    'author'           => 'Ameos team',
    'author_email'     => 'typo3dev@ameos.com',
    'author_company'   => 'Ameos',
    'state'            => 'stable',
    'version'          => '2.0.0',
    'constraints'      => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
            'php'   => '8.0.0-8.3.99'
        ],
        'conflicts' => [],
        'suggests'  => [],
    ],
];
