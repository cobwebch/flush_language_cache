====================
Flush Language Cache
====================

This small TYPO3 CMS extension adds an item to the flush cache menu to allow for
flushing only the language cache (``l10n``). This way you can avoid flushing the
whole system cache when updating just a couple of localized strings.

This extension requires TYPO3 CMS 6.2.

Just install it and flush the system cache. Reload the backend and the new
item will appear in the flush cache menu.
