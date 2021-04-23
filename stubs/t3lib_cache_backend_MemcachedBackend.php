<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\t3lib_cache_backend_MemcachedBackend::class)) {
    return;
}
class t3lib_cache_backend_MemcachedBackend
{
}
\class_alias('t3lib_cache_backend_MemcachedBackend', 't3lib_cache_backend_MemcachedBackend', \false);
