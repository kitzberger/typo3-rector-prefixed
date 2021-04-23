<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_sysaction_list::class)) {
    return;
}
class tx_sysaction_list
{
}
\class_alias('tx_sysaction_list', 'tx_sysaction_list', \false);
