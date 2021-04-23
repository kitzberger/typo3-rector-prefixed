<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_scheduler_CronCmd_Normalize::class)) {
    return;
}
class tx_scheduler_CronCmd_Normalize
{
}
\class_alias('tx_scheduler_CronCmd_Normalize', 'tx_scheduler_CronCmd_Normalize', \false);
