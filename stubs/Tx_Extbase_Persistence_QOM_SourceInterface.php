<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Persistence_QOM_SourceInterface::class)) {
    return;
}
interface Tx_Extbase_Persistence_QOM_SourceInterface
{
}
\class_alias('Tx_Extbase_Persistence_QOM_SourceInterface', 'Tx_Extbase_Persistence_QOM_SourceInterface', \false);
