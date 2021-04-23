<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Configuration_AbstractConfigurationManager::class)) {
    return;
}
class Tx_Extbase_Configuration_AbstractConfigurationManager
{
}
\class_alias('Tx_Extbase_Configuration_AbstractConfigurationManager', 'Tx_Extbase_Configuration_AbstractConfigurationManager', \false);
