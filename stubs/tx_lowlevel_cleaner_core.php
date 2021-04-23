<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_lowlevel_cleaner_core::class)) {
    return;
}
class tx_lowlevel_cleaner_core
{
}
\class_alias('tx_lowlevel_cleaner_core', 'tx_lowlevel_cleaner_core', \false);
