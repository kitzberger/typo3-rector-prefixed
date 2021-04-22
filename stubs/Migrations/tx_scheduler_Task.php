<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\tx_scheduler_Task::class)) {
    return;
}
final class tx_scheduler_Task
{
}
\class_alias('tx_scheduler_Task', 'tx_scheduler_Task', \false);
