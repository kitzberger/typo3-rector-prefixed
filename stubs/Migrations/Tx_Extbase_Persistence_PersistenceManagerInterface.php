<?php

namespace Typo3RectorPrefix20210422;

if (\interface_exists(\Typo3RectorPrefix20210422\Tx_Extbase_Persistence_PersistenceManagerInterface::class)) {
    return;
}
interface Tx_Extbase_Persistence_PersistenceManagerInterface
{
}
\class_alias('Tx_Extbase_Persistence_PersistenceManagerInterface', 'Tx_Extbase_Persistence_PersistenceManagerInterface', \false);
