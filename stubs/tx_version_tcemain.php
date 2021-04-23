<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_version_tcemain::class)) {
    return;
}
class tx_version_tcemain
{
}
\class_alias('tx_version_tcemain', 'tx_version_tcemain', \false);
