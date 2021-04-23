<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Persistence_QuerySettingsInterface::class)) {
    return;
}
interface Tx_Extbase_Persistence_QuerySettingsInterface
{
}
\class_alias('Tx_Extbase_Persistence_QuerySettingsInterface', 'Tx_Extbase_Persistence_QuerySettingsInterface', \false);
