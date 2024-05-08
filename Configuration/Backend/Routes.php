<?php

use Cobweb\FlushLanguageCache\Controller\FlushCacheController;

return [
    'flushLanguageCache' => [
            'path' => '/flush_language_cache/clear',
            'target' => FlushCacheController::class . '::flushCache'
    ]
];