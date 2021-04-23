<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Validation_Exception_InvalidSubject::class)) {
    return;
}
class Tx_Extbase_Validation_Exception_InvalidSubject
{
}
\class_alias('Tx_Extbase_Validation_Exception_InvalidSubject', 'Tx_Extbase_Validation_Exception_InvalidSubject', \false);
