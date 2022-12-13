<?php

/*********************************************************************
 * Extension configuration file for ext "flush_language_cache".
 *********************************************************************/

$EM_CONF[$_EXTKEY] = [
        'title' => 'Flush language cache',
        'description' => 'Adds an item to the flush cache menu to clear just the language (l10n) cache. Also provides a command-line tool for that.',
        'category' => 'be',
        'state' => 'stable',
        'uploadfolder' => 0,
        'createDirs' => '',
        'clearCacheOnLoad' => 1,
        'author' => 'Francois Suter',
        'author_email' => 'typo3@ideative.ch',
        'author_company' => '',
        'version' => '3.0.2',
        'constraints' => [
                'depends' => [
                        'typo3' => '11.5.0-12.9.99',
                        'php' => '7.4.0-8.1.99'
                ],
                'conflicts' => [],
                'suggests' => [],
        ],
];
