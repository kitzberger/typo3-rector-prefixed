<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\t3lib_cache_backend_ApcBackend::class)) {
    return;
}
class t3lib_cache_backend_ApcBackend
{
}
\class_alias('t3lib_cache_backend_ApcBackend', 't3lib_cache_backend_ApcBackend', \false);
