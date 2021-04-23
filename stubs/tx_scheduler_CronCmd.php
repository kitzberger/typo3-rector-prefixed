<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_scheduler_CronCmd::class)) {
    return;
}
class tx_scheduler_CronCmd
{
}
\class_alias('tx_scheduler_CronCmd', 'tx_scheduler_CronCmd', \false);
