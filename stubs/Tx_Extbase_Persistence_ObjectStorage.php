<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Persistence_ObjectStorage::class)) {
    return;
}
class Tx_Extbase_Persistence_ObjectStorage
{
}
\class_alias('Tx_Extbase_Persistence_ObjectStorage', 'Tx_Extbase_Persistence_ObjectStorage', \false);
