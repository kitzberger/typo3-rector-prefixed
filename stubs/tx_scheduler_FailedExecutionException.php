<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_scheduler_FailedExecutionException::class)) {
    return;
}
class tx_scheduler_FailedExecutionException
{
}
\class_alias('tx_scheduler_FailedExecutionException', 'tx_scheduler_FailedExecutionException', \false);
