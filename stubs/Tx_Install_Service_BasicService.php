<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Install_Service_BasicService::class)) {
    return;
}
class Tx_Install_Service_BasicService
{
}
\class_alias('Tx_Install_Service_BasicService', 'Tx_Install_Service_BasicService', \false);
