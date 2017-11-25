<?php

return [
        'tx_flushlanguagecache_clear' => [
                'path' => '/flush_language_cache/clear',
                'target' => \Cobweb\FlushLanguageCache\Toolbar\ToolbarItem::class . '::flushCache'
        ]
];
