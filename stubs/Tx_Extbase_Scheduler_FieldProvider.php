<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Scheduler_FieldProvider::class)) {
    return;
}
class Tx_Extbase_Scheduler_FieldProvider
{
}
\class_alias('Tx_Extbase_Scheduler_FieldProvider', 'Tx_Extbase_Scheduler_FieldProvider', \false);
