<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_lowlevel_versions::class)) {
    return;
}
class tx_lowlevel_versions
{
}
\class_alias('tx_lowlevel_versions', 'tx_lowlevel_versions', \false);
