<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Property_TypeConverterInterface::class)) {
    return;
}
interface Tx_Extbase_Property_TypeConverterInterface
{
}
\class_alias('Tx_Extbase_Property_TypeConverterInterface', 'Tx_Extbase_Property_TypeConverterInterface', \false);
