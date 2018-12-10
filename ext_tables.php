<?php
defined('TYPO3_MODE') or die();

(function () {
    // Register sprite icon for clear cache menu
    /** @var \TYPO3\CMS\Core\Imaging\IconRegistry $iconRegistry */
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'tx_flushlanguagecache_flush',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
                'source' => 'EXT:flush_language_cache/Resources/Public/Icons/FlushCache.svg'
        ]
    );

    // Register additional clear cache menu item
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['additionalBackendItems']['cacheActions']['flushLanguageCache'] = \Cobweb\FlushLanguageCache\Toolbar\ToolbarItem::class;
})();