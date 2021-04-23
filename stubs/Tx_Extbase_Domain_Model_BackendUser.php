<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Domain_Model_BackendUser::class)) {
    return;
}
class Tx_Extbase_Domain_Model_BackendUser
{
}
\class_alias('Tx_Extbase_Domain_Model_BackendUser', 'Tx_Extbase_Domain_Model_BackendUser', \false);
