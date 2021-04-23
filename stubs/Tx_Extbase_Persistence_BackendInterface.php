<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Persistence_BackendInterface::class)) {
    return;
}
interface Tx_Extbase_Persistence_BackendInterface
{
}
\class_alias('Tx_Extbase_Persistence_BackendInterface', 'Tx_Extbase_Persistence_BackendInterface', \false);
