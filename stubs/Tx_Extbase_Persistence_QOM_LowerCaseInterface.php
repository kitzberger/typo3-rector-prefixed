<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Persistence_QOM_LowerCaseInterface::class)) {
    return;
}
interface Tx_Extbase_Persistence_QOM_LowerCaseInterface
{
}
\class_alias('Tx_Extbase_Persistence_QOM_LowerCaseInterface', 'Tx_Extbase_Persistence_QOM_LowerCaseInterface', \false);
