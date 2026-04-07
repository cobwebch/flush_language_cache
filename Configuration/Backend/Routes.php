<?php

use Cobweb\FlushLanguageCache\Controller\FlushCacheController;

// TODO: remove when dropping support for TYPO3 13
return [
    'flushLanguageCache' => [
            'path' => '/flush_language_cache/clear',
            'target' => FlushCacheController::class . '::flushCache'
    ]
];