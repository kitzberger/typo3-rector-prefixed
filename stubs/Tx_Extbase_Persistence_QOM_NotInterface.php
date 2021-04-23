<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Persistence_QOM_NotInterface::class)) {
    return;
}
interface Tx_Extbase_Persistence_QOM_NotInterface
{
}
\class_alias('Tx_Extbase_Persistence_QOM_NotInterface', 'Tx_Extbase_Persistence_QOM_NotInterface', \false);
