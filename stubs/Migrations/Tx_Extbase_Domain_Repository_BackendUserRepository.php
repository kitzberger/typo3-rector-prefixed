<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\Tx_Extbase_Domain_Repository_BackendUserRepository::class)) {
    return;
}
final class Tx_Extbase_Domain_Repository_BackendUserRepository
{
}
\class_alias('Tx_Extbase_Domain_Repository_BackendUserRepository', 'Tx_Extbase_Domain_Repository_BackendUserRepository', \false);
