<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\t3lib_cache_backend_TransientMemoryBackend::class)) {
    return;
}
class t3lib_cache_backend_TransientMemoryBackend
{
}
\class_alias('t3lib_cache_backend_TransientMemoryBackend', 't3lib_cache_backend_TransientMemoryBackend', \false);
