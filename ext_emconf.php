<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Flush language cache',
    'description' => 'Adds an item to the flush cache menu to clear just the language (l10n) cache. Also provides a command-line tool for that.',
    'category' => 'be',
    'state' => 'stable',
    'author' => 'Francois Suter',
    'author_email' => 'typo3@ideative.ch',
    'author_company' => '',
    'version' => '5.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-13.4.99',
            'php' => '8.1.0-8.4.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
