<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "flush_language_cache".
 *
 * Auto generated 23-12-2014 14:16
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Flush language cache',
	'description' => 'Adds an item to the flush cache menu to flush just the language (l10n) cache.',
	'category' => 'be',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'clearCacheOnLoad' => 1,
	'author' => 'Francois Suter',
	'author_email' => 'typo3@cobweb.ch',
	'author_company' => '',
	'version' => '1.0.0',
	'constraints' =>
	array (
		'depends' =>
		array (
			'typo3' => '6.2.0-7.99.99',
		),
		'conflicts' =>
		array (
		),
		'suggests' =>
		array (
		),
	),
	'_md5_values_when_last_written' => 'a:7:{s:11:"LICENSE.txt";s:4:"b234";s:10:"README.rst";s:4:"f7cb";s:12:"ext_icon.png";s:4:"8064";s:14:"ext_tables.php";s:4:"e62e";s:31:"Classes/Toolbar/ToolbarItem.php";s:4:"a2ae";s:40:"Resources/Private/Language/locallang.xlf";s:4:"34a9";s:38:"Resources/Public/Images/FlushCache.png";s:4:"8064";}',
);

