<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Fluid_Core_Parser_Exception::class)) {
    return;
}
class Tx_Fluid_Core_Parser_Exception
{
}
\class_alias('Tx_Fluid_Core_Parser_Exception', 'Tx_Fluid_Core_Parser_Exception', \false);
