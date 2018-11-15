<?php
return [
    'flushLanguageCache' => [
            'path' => '/flush_language_cache/clear',
            'target' => \Cobweb\FlushLanguageCache\Controller\FlushCacheController::class . '::flushCache'
    ]
];
