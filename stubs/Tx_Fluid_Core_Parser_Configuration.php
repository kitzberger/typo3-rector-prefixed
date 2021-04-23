<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Fluid_Core_Parser_Configuration::class)) {
    return;
}
class Tx_Fluid_Core_Parser_Configuration
{
}
\class_alias('Tx_Fluid_Core_Parser_Configuration', 'Tx_Fluid_Core_Parser_Configuration', \false);
