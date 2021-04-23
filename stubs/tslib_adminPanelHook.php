<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tslib_adminPanelHook::class)) {
    return;
}
class tslib_adminPanelHook
{
}
\class_alias('tslib_adminPanelHook', 'tslib_adminPanelHook', \false);
