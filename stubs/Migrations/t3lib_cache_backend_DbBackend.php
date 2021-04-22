<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\t3lib_cache_backend_DbBackend::class)) {
    return;
}
final class t3lib_cache_backend_DbBackend
{
}
\class_alias('t3lib_cache_backend_DbBackend', 't3lib_cache_backend_DbBackend', \false);
