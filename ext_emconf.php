<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Customize Cache Hash',
    'description' => 'Custom additions to TYPO3\'s cache hash.',
    'category' => 'fe',
    'author' => 'Pixelant',
    'author_email' => 'info@pixelant.net',
    'state' => 'alpha',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'version' => '1.0.0-dev',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-10.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
