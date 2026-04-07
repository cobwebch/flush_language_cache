<?php

use Cobweb\FlushLanguageCache\Controller\FlushCacheController;

return [
    'clearcache_l10n' => [
        'path' => '/cache/l10n/flush',
        'methods' => ['POST'],
        'target' => FlushCacheController::class . '::flushCache'
    ]
];