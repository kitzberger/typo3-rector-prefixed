<?php

namespace Typo3RectorPrefix20210422;

if (\interface_exists(\Typo3RectorPrefix20210422\Tx_Extbase_Persistence_QueryFactoryInterface::class)) {
    return;
}
interface Tx_Extbase_Persistence_QueryFactoryInterface
{
}
\class_alias('Tx_Extbase_Persistence_QueryFactoryInterface', 'Tx_Extbase_Persistence_QueryFactoryInterface', \false);
