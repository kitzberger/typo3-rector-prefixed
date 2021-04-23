<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Object_ObjectManagerInterface::class)) {
    return;
}
interface Tx_Extbase_Object_ObjectManagerInterface
{
}
\class_alias('Tx_Extbase_Object_ObjectManagerInterface', 'Tx_Extbase_Object_ObjectManagerInterface', \false);
