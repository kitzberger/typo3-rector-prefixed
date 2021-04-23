<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Persistence_ObjectMonitoringInterface::class)) {
    return;
}
interface Tx_Extbase_Persistence_ObjectMonitoringInterface
{
}
\class_alias('Tx_Extbase_Persistence_ObjectMonitoringInterface', 'Tx_Extbase_Persistence_ObjectMonitoringInterface', \false);
