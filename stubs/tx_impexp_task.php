<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_impexp_task::class)) {
    return;
}
class tx_impexp_task
{
}
\class_alias('tx_impexp_task', 'tx_impexp_task', \false);
