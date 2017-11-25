<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}


// Register sprite icons for new tables
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

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler (
	'language_cache::flushCache',
	'Cobweb\\FlushLanguageCache\\Toolbar\\ToolbarItem->flushCache'
);
