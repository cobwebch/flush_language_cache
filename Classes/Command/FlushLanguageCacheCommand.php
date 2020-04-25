<?php
declare(strict_types=1);

namespace Cobweb\FlushLanguageCache\Command;

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

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Command-line utility for flushing the language cache.
 *
 * @package Cobweb\FlushLanguageCache\Command
 */
class FlushLanguageCacheCommand extends Command
{

    /**
     * Configures the command by setting its name, description and options.
     *
     * @return void
     */
    public function configure()
    {
        $this->setDescription('Clears the language cache (l10n).')
                ->setHelp('Just run the command and the whole language cache will be cleared.');
    }

    /**
     * Executes the command to clear the cache.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        try {
            $cacheFrontend = GeneralUtility::makeInstance(CacheManager::class)->getCache('l10n');
            $cacheFrontend->flush();

            $io->success('Done clearing the language cache (l10n).');
            $io->note('If you still don\'t see what you want, you may want to update the TYPO3 language packs.');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $io->success(
                    sprintf(
                            'Faile clearing the language cache (l10n). Error: %s (%d)',
                            $e->getMessage(),
                            $e->getCode()
                    )
            );
            return Command::FAILURE;
        }

    }
}