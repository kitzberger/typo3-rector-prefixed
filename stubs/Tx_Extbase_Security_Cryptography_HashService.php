<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Security_Cryptography_HashService::class)) {
    return;
}
class Tx_Extbase_Security_Cryptography_HashService
{
}
\class_alias('Tx_Extbase_Security_Cryptography_HashService', 'Tx_Extbase_Security_Cryptography_HashService', \false);
