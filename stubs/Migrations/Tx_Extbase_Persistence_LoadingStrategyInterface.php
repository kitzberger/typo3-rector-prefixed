<?php

namespace Typo3RectorPrefix20210422;

if (\interface_exists(\Typo3RectorPrefix20210422\Tx_Extbase_Persistence_LoadingStrategyInterface::class)) {
    return;
}
interface Tx_Extbase_Persistence_LoadingStrategyInterface
{
}
\class_alias('Tx_Extbase_Persistence_LoadingStrategyInterface', 'Tx_Extbase_Persistence_LoadingStrategyInterface', \false);
