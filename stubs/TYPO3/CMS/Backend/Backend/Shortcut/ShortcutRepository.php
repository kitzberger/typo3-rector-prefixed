<?php

declare (strict_types=1);
namespace TYPO3\CMS\Backend\Backend\Shortcut;

if (\class_exists(\TYPO3\CMS\Backend\Backend\Shortcut\ShortcutRepository::class)) {
    return;
}
class ShortcutRepository
{
    public function shortcutExists(string $url) : bool
    {
        return \true;
    }
}
