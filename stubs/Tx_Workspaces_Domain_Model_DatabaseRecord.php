<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Workspaces_Domain_Model_DatabaseRecord::class)) {
    return;
}
class Tx_Workspaces_Domain_Model_DatabaseRecord
{
}
\class_alias('Tx_Workspaces_Domain_Model_DatabaseRecord', 'Tx_Workspaces_Domain_Model_DatabaseRecord', \false);
