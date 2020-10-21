<?php

$EM_CONF[$_EXTKEY] = [
    'title'            => 'Dailymotion online media service',
    'description'      => 'Dailymotion online media service',
    'category'         => 'misc',
    'author'           => 'Ameos team',
    'author_email'     => 'typo3dev@ameos.com',
    'author_company'   => 'Ameos',
    'state'            => 'stable',
    'version'          => '1.0.7',
    'constraints'      => [
        'depends' => [
            'typo3' => '8.7.0-10.4.99',
            'php'   => '7.0.0-7.3.99'
        ],
        'conflicts' => [],
        'suggests'  => [],
    ],
    
];
