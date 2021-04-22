<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\Tx_Extbase_Security_Cryptography_HashService::class)) {
    return;
}
final class Tx_Extbase_Security_Cryptography_HashService
{
}
\class_alias('Tx_Extbase_Security_Cryptography_HashService', 'Tx_Extbase_Security_Cryptography_HashService', \false);
