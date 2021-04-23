<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tslib_content_PostInitHook::class)) {
    return;
}
class tslib_content_PostInitHook
{
}
\class_alias('tslib_content_PostInitHook', 'tslib_content_PostInitHook', \false);
