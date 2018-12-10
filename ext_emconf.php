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
        'author_email' => 'typo3@cobweb.ch',
        'author_company' => '',
        'version' => '2.1.0',
        'constraints' => [
                'depends' => [
                        'typo3' => '8.7.0-9.99.99',
                        'php' => '7.0.0-7.2.99'
                ],
                'conflicts' => [],
                'suggests' => [],
        ],
];
