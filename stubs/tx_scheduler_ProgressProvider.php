<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_scheduler_ProgressProvider::class)) {
    return;
}
class tx_scheduler_ProgressProvider
{
}
\class_alias('tx_scheduler_ProgressProvider', 'tx_scheduler_ProgressProvider', \false);
