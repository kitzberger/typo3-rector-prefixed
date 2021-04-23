<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\t3lib_cache_backend_RedisBackend::class)) {
    return;
}
class t3lib_cache_backend_RedisBackend
{
}
\class_alias('t3lib_cache_backend_RedisBackend', 't3lib_cache_backend_RedisBackend', \false);
