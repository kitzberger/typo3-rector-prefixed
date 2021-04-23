<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\ux_t3lib_sqlparser::class)) {
    return;
}
class ux_t3lib_sqlparser
{
}
\class_alias('ux_t3lib_sqlparser', 'ux_t3lib_sqlparser', \false);
