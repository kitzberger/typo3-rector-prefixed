<?php

declare (strict_types=1);
namespace TYPO3\CMS\Version\Hook;

if (\class_exists(\TYPO3\CMS\Version\Hook\PreviewHook::class)) {
    return;
}
class PreviewHook
{
}
