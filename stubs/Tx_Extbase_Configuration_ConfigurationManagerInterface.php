<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Configuration_ConfigurationManagerInterface::class)) {
    return;
}
interface Tx_Extbase_Configuration_ConfigurationManagerInterface
{
}
\class_alias('Tx_Extbase_Configuration_ConfigurationManagerInterface', 'Tx_Extbase_Configuration_ConfigurationManagerInterface', \false);
