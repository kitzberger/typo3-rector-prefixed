<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Persistence_Storage_Exception_SqlError::class)) {
    return;
}
class Tx_Extbase_Persistence_Storage_Exception_SqlError
{
}
\class_alias('Tx_Extbase_Persistence_Storage_Exception_SqlError', 'Tx_Extbase_Persistence_Storage_Exception_SqlError', \false);
