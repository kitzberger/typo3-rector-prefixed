<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\Tx_Extbase_Scheduler_TaskExecutor::class)) {
    return;
}
final class Tx_Extbase_Scheduler_TaskExecutor
{
}
\class_alias('Tx_Extbase_Scheduler_TaskExecutor', 'Tx_Extbase_Scheduler_TaskExecutor', \false);
