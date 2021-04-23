<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Fluid_Core_Parser_InterceptorInterface::class)) {
    return;
}
interface Tx_Fluid_Core_Parser_InterceptorInterface
{
}
\class_alias('Tx_Fluid_Core_Parser_InterceptorInterface', 'Tx_Fluid_Core_Parser_InterceptorInterface', \false);
