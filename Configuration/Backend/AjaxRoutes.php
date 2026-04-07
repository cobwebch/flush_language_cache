<?php

use Cobweb\FlushLanguageCache\Controller\AjaxFlushCacheController;

return [
    'clearcache_l10n' => [
        'path' => '/cache/l10n/flush',
        'methods' => ['POST'],
        'target' => AjaxFlushCacheController::class . '::flushCache'
    ]
];