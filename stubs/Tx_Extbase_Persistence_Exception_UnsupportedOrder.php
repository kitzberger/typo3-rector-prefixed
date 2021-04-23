<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Persistence_Exception_UnsupportedOrder::class)) {
    return;
}
class Tx_Extbase_Persistence_Exception_UnsupportedOrder
{
}
\class_alias('Tx_Extbase_Persistence_Exception_UnsupportedOrder', 'Tx_Extbase_Persistence_Exception_UnsupportedOrder', \false);
