<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Persistence_QOM_UpperCaseInterface::class)) {
    return;
}
interface Tx_Extbase_Persistence_QOM_UpperCaseInterface
{
}
\class_alias('Tx_Extbase_Persistence_QOM_UpperCaseInterface', 'Tx_Extbase_Persistence_QOM_UpperCaseInterface', \false);
