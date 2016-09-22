<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}


if (version_compare(TYPO3_version, '7.6', '>=')) {
    /** @var \TYPO3\CMS\Core\Imaging\IconRegistry $iconRegistry */
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Imaging\\IconRegistry');
    $iconRegistry->registerIcon('extensions-' . $_EXTKEY . '-flush_cache',
        'TYPO3\\CMS\\Core\\Imaging\\IconProvider\\BitmapIconProvider',
        array(
            'source' => 'EXT:' . $_EXTKEY . '/Resources/Public/Images/FlushCache.png',
        )
    );
    unset($iconRegistry);
} else {

    \TYPO3\CMS\Backend\Sprite\SpriteManager::addSingleIcons(
        array(
            'flush_cache' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Images/FlushCache.png'
        ),
        $_EXTKEY
    );
}



// Register additional clear cache menu item
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['additionalBackendItems']['cacheActions']['flushLanguageCache'] = 'Cobweb\\FlushLanguageCache\\Toolbar\\ToolbarItem';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler (
	'language_cache::flushCache',
	'Cobweb\\FlushLanguageCache\\Toolbar\\ToolbarItem->flushCache'
);
