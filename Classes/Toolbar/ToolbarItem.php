<?php
namespace Cobweb\FlushLanguageCache\Toolbar;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Backend\Routing\UriBuilder;
use TYPO3\CMS\Backend\Toolbar\ClearCacheActionsHookInterface;
use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Prepares additional flush cache entry.
 *
 * @package Cobweb\ClearLanguageCache\Toolbar
 * @author Francois Suter <support@cobweb.ch>
 */
class ToolbarItem implements ClearCacheActionsHookInterface {
	static public $itemKey = 'flushLanguageCache';

	/**
	 * Adds the flush language cache menu item.
	 *
	 * @param array $cacheActions Array of CacheMenuItems
	 * @param array $optionValues Array of AccessConfigurations-identifiers (typically used by userTS with options.clearCache.identifier)
	 * @return void
	 */
	public function manipulateCacheActions(&$cacheActions, &$optionValues) {
        if ($this->getBackendUser()->isAdmin() || $this->getBackendUser()->getTSConfigVal('options.clearCache.flushLanguageCache')) {
            /** @var UriBuilder $uriBuilder */
            $uriBuilder = GeneralUtility::makeInstance(UriBuilder::class);
            try {
                $uri = $uriBuilder->buildUriFromRoute('ajax_tx_flushlanguagecache_clear');
                $cacheActions[] = [
                    'id' => self::$itemKey,
                    'title' => 'LLL:EXT:flush_language_cache/Resources/Private/Language/locallang.xlf:flushLanguageCache',
                     'description' => 'LLL:EXT:flush_language_cache/Resources/Private/Language/locallang.xlf:flushLanguageCache.description',
                    'href' => $uri,
                    'iconIdentifier'  => 'tx_flushlanguagecache_flush'
                ];
                $optionValues[] = self::$itemKey;
            } catch (\TYPO3\CMS\Backend\Routing\Exception\RouteNotFoundException $e) {
                // Do nothing, i.e. do not add the menu item if the AJAX route cannot be found
            }
		}
	}

	/**
	 * Flushes the language cache (l10n).
	 *
	 * @return void
	 */
	public function flushCache() {
		/** @var \TYPO3\CMS\Core\Cache\Frontend\FrontendInterface $cacheFrontend */
		$cacheFrontend = GeneralUtility::makeInstance(CacheManager::class)->getCache('l10n');
		$cacheFrontend->flush();
	}

	/**
	 * Wrapper around the global BE user object.
	 *
	 * @return \TYPO3\CMS\Core\Authentication\BackendUserAuthentication
	 */
	protected function getBackendUser() {
		return $GLOBALS['BE_USER'];
	}
}