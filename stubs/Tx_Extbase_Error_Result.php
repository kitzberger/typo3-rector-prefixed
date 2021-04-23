<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Error_Result::class)) {
    return;
}
class Tx_Extbase_Error_Result
{
}
\class_alias('Tx_Extbase_Error_Result', 'Tx_Extbase_Error_Result', \false);
