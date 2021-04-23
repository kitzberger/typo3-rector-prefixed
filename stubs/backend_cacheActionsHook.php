<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\backend_cacheActionsHook::class)) {
    return;
}
class backend_cacheActionsHook
{
}
\class_alias('backend_cacheActionsHook', 'backend_cacheActionsHook', \false);
