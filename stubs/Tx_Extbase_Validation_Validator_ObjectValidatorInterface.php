<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Validation_Validator_ObjectValidatorInterface::class)) {
    return;
}
interface Tx_Extbase_Validation_Validator_ObjectValidatorInterface
{
}
\class_alias('Tx_Extbase_Validation_Validator_ObjectValidatorInterface', 'Tx_Extbase_Validation_Validator_ObjectValidatorInterface', \false);
