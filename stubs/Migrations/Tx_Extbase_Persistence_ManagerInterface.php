<?php

namespace Typo3RectorPrefix20210422;

if (\interface_exists(\Typo3RectorPrefix20210422\Tx_Extbase_Persistence_ManagerInterface::class)) {
    return;
}
interface Tx_Extbase_Persistence_ManagerInterface
{
}
\class_alias('Tx_Extbase_Persistence_ManagerInterface', 'Tx_Extbase_Persistence_ManagerInterface', \false);
