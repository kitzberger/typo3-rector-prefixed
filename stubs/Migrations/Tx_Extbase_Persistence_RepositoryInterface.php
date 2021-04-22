<?php

namespace Typo3RectorPrefix20210422;

if (\interface_exists(\Typo3RectorPrefix20210422\Tx_Extbase_Persistence_RepositoryInterface::class)) {
    return;
}
interface Tx_Extbase_Persistence_RepositoryInterface
{
}
\class_alias('Tx_Extbase_Persistence_RepositoryInterface', 'Tx_Extbase_Persistence_RepositoryInterface', \false);
