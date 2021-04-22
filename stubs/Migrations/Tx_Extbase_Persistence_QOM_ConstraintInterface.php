<?php

namespace Typo3RectorPrefix20210422;

if (\interface_exists(\Typo3RectorPrefix20210422\Tx_Extbase_Persistence_QOM_ConstraintInterface::class)) {
    return;
}
interface Tx_Extbase_Persistence_QOM_ConstraintInterface
{
}
\class_alias('Tx_Extbase_Persistence_QOM_ConstraintInterface', 'Tx_Extbase_Persistence_QOM_ConstraintInterface', \false);
