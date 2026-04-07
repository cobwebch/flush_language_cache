<?php

declare(strict_types=1);

namespace Cobweb\FlushLanguageCache\Controller;

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

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Http\JsonResponse;
use TYPO3\CMS\Core\Localization\LanguageService;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class AjaxFlushCacheController
{
    /**
     * Main dispatcher entry method registered as "clearcache_l10n" AJAX end point.
     * Flushes the language cache (l10n).
     *
     * @param ServerRequestInterface $request the current request
     * @return ResponseInterface
     */
    public function flushCache(ServerRequestInterface $request): ResponseInterface
    {
        $languageService = $this->getLanguageService();
        try {
            $cacheFrontend = GeneralUtility::makeInstance(CacheManager::class)->getCache('l10n');
            $cacheFrontend->flush();
        } catch (\Exception $e) {
            $message = sprintf(
                $languageService->sL(
                    'LLL:EXT:flush_language_cache/Resources/Private/Language/locallang.xlf:flushLanguageCache.error.message'
                ),
                $e->getMessage(),
                $e->getCode()
            );
            return new JsonResponse(
                [
                    'success' => false,
                    'title' => $languageService->sL(
                        'LLL:EXT:flush_language_cache/Resources/Private/Language/locallang.xlf:flushLanguageCache.error.title'
                    ),
                    'message' => $message,
                ]
            );
        }

        return new JsonResponse(
            [
                'success' => true,
                'title' => $languageService->sL(
                    'LLL:EXT:flush_language_cache/Resources/Private/Language/locallang.xlf:flushLanguageCache.success.title'
                ),
                'message' => $languageService->sL(
                    'LLL:EXT:flush_language_cache/Resources/Private/Language/locallang.xlf:flushLanguageCache.success.message'
                ),
            ]
        );
    }

    protected function getLanguageService(): LanguageService
    {
        return $GLOBALS['LANG'];
    }
}