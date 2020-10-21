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
        'version' => '2.2.2',
        'constraints' => [
                'depends' => [
                        'typo3' => '9.5.0-10.4.99',
                        'php' => '7.2.0-7.4.99'
                ],
                'conflicts' => [],
                'suggests' => [],
        ],
];
