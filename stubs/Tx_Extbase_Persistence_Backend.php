<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Persistence_Backend::class)) {
    return;
}
class Tx_Extbase_Persistence_Backend
{
}
\class_alias('Tx_Extbase_Persistence_Backend', 'Tx_Extbase_Persistence_Backend', \false);
