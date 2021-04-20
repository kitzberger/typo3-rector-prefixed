<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Backend\Backend\Shortcut\ShortcutRepository::class)) {
    return;
}
final class ShortcutRepository
{
    public function shortcutExists(string $url) : bool
    {
        return \true;
    }
}
