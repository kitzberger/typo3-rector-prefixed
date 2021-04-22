<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\ux_t3lib_sqlparser::class)) {
    return;
}
final class ux_t3lib_sqlparser
{
}
\class_alias('ux_t3lib_sqlparser', 'ux_t3lib_sqlparser', \false);
