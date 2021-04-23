<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\ux_t3lib_DB::class)) {
    return;
}
class ux_t3lib_DB
{
}
\class_alias('ux_t3lib_DB', 'ux_t3lib_DB', \false);
