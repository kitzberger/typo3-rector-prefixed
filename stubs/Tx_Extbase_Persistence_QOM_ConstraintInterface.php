<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Persistence_QOM_ConstraintInterface::class)) {
    return;
}
interface Tx_Extbase_Persistence_QOM_ConstraintInterface
{
}
\class_alias('Tx_Extbase_Persistence_QOM_ConstraintInterface', 'Tx_Extbase_Persistence_QOM_ConstraintInterface', \false);
