<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_taskcenter_Task::class)) {
    return;
}
class tx_taskcenter_Task
{
}
\class_alias('tx_taskcenter_Task', 'tx_taskcenter_Task', \false);
