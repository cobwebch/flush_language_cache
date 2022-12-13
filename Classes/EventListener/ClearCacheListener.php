<?php

declare(strict_types=1);

namespace Cobweb\FlushLanguageCache\EventListener;

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

use TYPO3\CMS\Backend\Backend\Event\ModifyClearCacheActionsEvent;
use TYPO3\CMS\Backend\Routing\Exception\RouteNotFoundException;
use TYPO3\CMS\Backend\Routing\UriBuilder;
use TYPO3\CMS\Core\Authentication\BackendUserAuthentication;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Prepares additional flush cache entry.
 */
class ClearCacheListener
{
    static public string $itemKey = 'flushLanguageCache';

    /**
     * Adds the flush language cache menu item.
     *
     * @param ModifyClearCacheActionsEvent $event
     * @return void
     */
    public function __invoke(ModifyClearCacheActionsEvent $event): void
    {
        // First check if user has right to access the flush language cache item
        $tsConfig = $this->getBackendUser()->getTSConfig();
        $option = $tsConfig['options.']['clearCache.']['flushLanguageCache'] ?? false;
        if ((bool)$option || $this->getBackendUser()->isAdmin()) {
            /** @var UriBuilder $uriBuilder */
            $uriBuilder = GeneralUtility::makeInstance(UriBuilder::class);
            try {
                $uri = $uriBuilder->buildUriFromRoute('flushLanguageCache');
                $event->addCacheAction(
                    [
                        'id' => self::$itemKey,
                        'title' => 'LLL:EXT:flush_language_cache/Resources/Private/Language/locallang.xlf:flushLanguageCache',
                        'description' => 'LLL:EXT:flush_language_cache/Resources/Private/Language/locallang.xlf:flushLanguageCache.description',
                        'href' => $uri,
                        'iconIdentifier' => 'tx_flushlanguagecache_flush'
                    ]
                );
                $event->addCacheActionIdentifier(self::$itemKey);
            } catch (RouteNotFoundException $e) {
                // Do nothing, i.e. do not add the menu item if the AJAX route cannot be found
            }
        }
    }

    /**
     * Wrapper around the global BE user object.
     *
     * @return BackendUserAuthentication
     */
    protected function getBackendUser(): BackendUserAuthentication
    {
        return $GLOBALS['BE_USER'];
    }
}
