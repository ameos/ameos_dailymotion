<?php

$EM_CONF[$_EXTKEY] = [
    'title'            => 'Dailymotion online media service',
    'description'      => 'Dailymotion online media service',
    'category'         => 'misc',
    'author'           => 'Ameos team',
    'author_email'     => 'typo3dev@ameos.com',
    'author_company'   => 'Ameos',
    'shy'              => '',
    'priority'         => '',
    'module'           => '',
    'state'            => 'stable',
    'internal'         => '',
    'uploadfolder'     => '0',
    'createDirs'       => '',
    'modify_tables'    => '',
    'clearCacheOnLoad' => 0,
    'lockType'         => '',
    'version'          => '1.0.5',
    'autoload'         => ['psr-4' => ['Ameos\\AmeosDailymotion\\' => 'Classes']],
    'constraints'      => [
        'depends' => [
            'typo3' => '7.6.0-9.5.99',
            'php'   => '5.5.0-7.2.99'
        ],
        'conflicts' => [],
        'suggests'  => [],
    ],
    
];
