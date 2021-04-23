<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Persistence_Storage_Typo3DbBackend::class)) {
    return;
}
class Tx_Extbase_Persistence_Storage_Typo3DbBackend
{
}
\class_alias('Tx_Extbase_Persistence_Storage_Typo3DbBackend', 'Tx_Extbase_Persistence_Storage_Typo3DbBackend', \false);
