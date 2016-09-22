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
use TYPO3\CMS\Backend\Utility\IconUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Backend\Utility\BackendUtility;

/**
 * Prepares additional flush cache entry.
 *
 * @package Cobweb\ClearLanguageCache\Toolbar
 * @author Francois Suter <support@cobweb.ch>
 */
class ToolbarItem implements \TYPO3\CMS\Backend\Toolbar\ClearCacheActionsHookInterface {
	static $itemKey = 'flushLanguageCache';

	/**
	 * Adds the flush language cache menu item.
	 *
	 * @param array $cacheActions Array of CacheMenuItems
	 * @param array $optionValues Array of AccessConfigurations-identifiers (typically used by userTS with options.clearCache.identifier)
	 * @return void
	 */
	public function manipulateCacheActions(&$cacheActions, &$optionValues) {
		if ($this->getBackendUser()->isAdmin()) {
			$cacheActions[] = array(
				'id'    => self::$itemKey,
				'title' => $this->getLanguageService()->sL('LLL:EXT:flush_language_cache/Resources/Private/Language/locallang.xlf:flushLanguageCache'),
				'href'  => BackendUtility::getAjaxUrl('language_cache::flushCache'),
				'icon'  => $this->getLanguageFlushCacheIcon()
			);
			$optionValues[] = self::$itemKey;
		}
	}

	/**
	 * Flushes the language cache (l10n).
	 *
	 * @return void
	 */
	public function flushCache() {
		/** @var \TYPO3\CMS\Core\Cache\Frontend\FrontendInterface $cacheFrontend */
		$cacheFrontend = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Cache\\CacheManager')->getCache('l10n');
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

	/**
	 * Wrapper around the global language object.
	 *
	 * @return \TYPO3\CMS\Lang\LanguageService
	 */
	protected function getLanguageService() {
		return $GLOBALS['LANG'];
	}

	/**
	 * @return string Icon MarkUp
	 */
	public function getLanguageFlushCacheIcon() {
		if (version_compare(TYPO3_version, '7.6', '>=')) {
			$iconFactory = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Imaging\\IconFactory');
			return $iconFactory->getIcon('extensions-flush_language_cache-flush_cache', \TYPO3\CMS\Core\Imaging\Icon::SIZE_SMALL)->render();
		}else{
			return IconUtility::getSpriteIcon('extensions-flush_language_cache-flush_cache');
		}
	}
}