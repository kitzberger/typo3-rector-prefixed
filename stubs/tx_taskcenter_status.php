<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_taskcenter_status::class)) {
    return;
}
class tx_taskcenter_status
{
}
\class_alias('tx_taskcenter_status', 'tx_taskcenter_status', \false);
