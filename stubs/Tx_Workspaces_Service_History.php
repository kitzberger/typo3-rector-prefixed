<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Workspaces_Service_History::class)) {
    return;
}
class Tx_Workspaces_Service_History
{
}
\class_alias('Tx_Workspaces_Service_History', 'Tx_Workspaces_Service_History', \false);
