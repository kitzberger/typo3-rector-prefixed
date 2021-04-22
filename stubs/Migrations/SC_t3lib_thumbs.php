<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\SC_t3lib_thumbs::class)) {
    return;
}
final class SC_t3lib_thumbs
{
}
\class_alias('SC_t3lib_thumbs', 'SC_t3lib_thumbs', \false);
