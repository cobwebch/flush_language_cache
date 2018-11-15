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
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class FlushCacheController
 * @package Cobweb\FlushLanguageCache\Controller
 */
class FlushCacheController
{
    /**
     * Main dispatcher entry method registered as "flushLanguageCache" end point
     * Flushes the language cache (l10n).
     *
     * @param ServerRequestInterface $request the current request
     * @param ResponseInterface $response the current response
     * @return ResponseInterface
     */
    public function flushCache(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        /** @var \TYPO3\CMS\Core\Cache\Frontend\FrontendInterface $cacheFrontend */
        $cacheFrontend = GeneralUtility::makeInstance(CacheManager::class)->getCache('l10n');
        $cacheFrontend->flush();

        $response->getBody()->write('');
        return $response;
    }
}
