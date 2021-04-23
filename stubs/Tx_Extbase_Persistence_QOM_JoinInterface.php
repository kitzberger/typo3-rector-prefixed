<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Persistence_QOM_JoinInterface::class)) {
    return;
}
interface Tx_Extbase_Persistence_QOM_JoinInterface
{
}
\class_alias('Tx_Extbase_Persistence_QOM_JoinInterface', 'Tx_Extbase_Persistence_QOM_JoinInterface', \false);
