<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\t3lib_lock::class)) {
    return;
}
final class t3lib_lock
{
}
\class_alias('t3lib_lock', 't3lib_lock', \false);
