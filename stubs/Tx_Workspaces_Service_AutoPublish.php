<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Workspaces_Service_AutoPublish::class)) {
    return;
}
class Tx_Workspaces_Service_AutoPublish
{
}
\class_alias('Tx_Workspaces_Service_AutoPublish', 'Tx_Workspaces_Service_AutoPublish', \false);
