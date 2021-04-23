<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Validation_Exception_NoSuchValidator::class)) {
    return;
}
class Tx_Extbase_Validation_Exception_NoSuchValidator
{
}
\class_alias('Tx_Extbase_Validation_Exception_NoSuchValidator', 'Tx_Extbase_Validation_Exception_NoSuchValidator', \false);
