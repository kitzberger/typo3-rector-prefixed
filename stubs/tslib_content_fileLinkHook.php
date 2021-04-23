<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tslib_content_fileLinkHook::class)) {
    return;
}
class tslib_content_fileLinkHook
{
}
\class_alias('tslib_content_fileLinkHook', 'tslib_content_fileLinkHook', \false);
