<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Persistence_QueryResultInterface::class)) {
    return;
}
interface Tx_Extbase_Persistence_QueryResultInterface
{
}
\class_alias('Tx_Extbase_Persistence_QueryResultInterface', 'Tx_Extbase_Persistence_QueryResultInterface', \false);
