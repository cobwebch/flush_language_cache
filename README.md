[![Latest Stable Version](https://poser.pugx.org/cobweb/flush_language_cache/v)](https://packagist.org/packages/cobweb/flush_language_cache)
[![Total Downloads](http://poser.pugx.org/cobweb/flush_language_cache/downloads)](https://packagist.org/packages/cobweb/flush_language_cache)
[![Monthly Downloads](http://poser.pugx.org/cobweb/flush_language_cache/d/monthly)](https://packagist.org/packages/cobweb/flush_language_cache)
[![Daily Downloads](http://poser.pugx.org/cobweb/flush_language_cache/d/daily)](https://packagist.org/packages/cobweb/flush_language_cache)
[![PHP Version Require](http://poser.pugx.org/cobweb/flush_language_cache/require/php)](https://packagist.org/packages/cobweb/flush_language_cache)

# Flush Language Cache

This small TYPO3 CMS extension adds an item to the flush cache menu to allow for
flushing only the language cache (`l10n`). This way you can avoid flushing the
whole system cache when updating just a couple of localized strings (in locallang
files).

This extension requires TYPO3 CMS 11 or more.

Just install it and flush the system cache. Reload the backend and the new
item will appear in the flush cache menu.

There is also a command-line tool that can be called with:

```text
path/to/php path/to/bin/typo3 languagecache:flush
```

## User TSconfig

It is possible to give access to this flush cache option to ordinary backend users
with the following User TSconfig:

```typoscript
options.clearCache.flushLanguageCache = 1
```

## Credits

The icon is based on the following images:

* thunderbolt by H Alberto Gongora from the Noun Project
* chat bubble by Tereza Moravcová from the Noun Project

Thanks to Dmytro Nozdrin for the TYPO3 9 compatibility update and some code cleanup.
