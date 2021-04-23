<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Error_Error::class)) {
    return;
}
class Tx_Extbase_Error_Error
{
}
\class_alias('Tx_Extbase_Error_Error', 'Tx_Extbase_Error_Error', \false);
