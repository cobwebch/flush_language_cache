<?php
namespace Cobweb\FlushLanguageCache\Command;

use Cobweb\FlushLanguageCache\Toolbar\ToolbarItem;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Make cache flushing possible from command line.
 *
 * @package Cobweb\ClearLanguageCache\Command
 */
class FlushCacheCommandController extends \TYPO3\CMS\Extbase\Mvc\Controller\CommandController
{
	protected $toolbarItem;
	
	public function injectObjectManager(\TYPO3\CMS\Extbase\Object\ObjectManagerInterface $objectManager) {
		parent::injectObjectManager($objectManager);
		$this->toolbarItem = $this->objectManager->get(ToolbarItem::class);
	}
	
	/**
	 * Flushes the language cache (l10n).
	 */
	public function flushCommand() {
		$this->toolbarItem->flushCache();
		$this->outputLine('The Language Cache (l10n) has been flushed.');
		
		// There is a command of the typo3-sysext "lang" - but it takes a lot longer.
		$this->outputLine('If you don\'t see your texts updated, use language:update instead.');
	}
}