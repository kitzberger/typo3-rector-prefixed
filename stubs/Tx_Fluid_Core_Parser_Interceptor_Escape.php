<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Fluid_Core_Parser_Interceptor_Escape::class)) {
    return;
}
class Tx_Fluid_Core_Parser_Interceptor_Escape
{
}
\class_alias('Tx_Fluid_Core_Parser_Interceptor_Escape', 'Tx_Fluid_Core_Parser_Interceptor_Escape', \false);
