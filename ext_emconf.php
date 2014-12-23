<?php

########################################################################
# Extension Manager/Repository config file for ext: "clear_language_cache"
#
# Auto generated 21-12-2009 22:35
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Flush language cache',
	'description' => 'Adds an item to the flush cache menu to flush just the language (l10n) cache.',
	'category' => 'be',
	'shy' => FALSE,
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 1,
	'lockType' => '',
	'author' => 'Francois Suter',
	'author_email' => 'typo3@cobweb.ch',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'version' => '1.0.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.2.0-6.2.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:21:{s:9:"ChangeLog";s:4:"23f6";s:19:"class.tx_devlog.php";s:4:"9182";s:28:"class.tx_devlog_tceforms.php";s:4:"5e2a";s:21:"ext_conf_template.txt";s:4:"af5a";s:12:"ext_icon.gif";s:4:"cd8e";s:17:"ext_localconf.php";s:4:"a7f0";s:14:"ext_tables.php";s:4:"4845";s:14:"ext_tables.sql";s:4:"8608";s:18:"icon_tx_devlog.gif";s:4:"cd8e";s:13:"locallang.xml";s:4:"68e6";s:26:"locallang_csh_txdevlog.xml";s:4:"b9da";s:16:"locallang_db.xml";s:4:"03db";s:7:"tca.php";s:4:"162e";s:14:"doc/manual.sxw";s:4:"6ba1";s:14:"mod1/clear.gif";s:4:"cc11";s:13:"mod1/conf.php";s:4:"4129";s:14:"mod1/index.php";s:4:"2969";s:18:"mod1/locallang.xml";s:4:"68d2";s:22:"mod1/locallang_mod.xml";s:4:"5454";s:19:"mod1/moduleicon.gif";s:4:"cd8e";s:22:"res/csh_severities.png";s:4:"facf";}',
	'suggests' => array(
	),
);

?>