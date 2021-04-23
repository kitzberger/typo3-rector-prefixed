<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Security_Exception_SyntacticallyWrongRequestHash::class)) {
    return;
}
class Tx_Extbase_Security_Exception_SyntacticallyWrongRequestHash
{
}
\class_alias('Tx_Extbase_Security_Exception_SyntacticallyWrongRequestHash', 'Tx_Extbase_Security_Exception_SyntacticallyWrongRequestHash', \false);
