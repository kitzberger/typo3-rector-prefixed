<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Fluid_View_Exception_InvalidSectionException::class)) {
    return;
}
class Tx_Fluid_View_Exception_InvalidSectionException
{
}
\class_alias('Tx_Fluid_View_Exception_InvalidSectionException', 'Tx_Fluid_View_Exception_InvalidSectionException', \false);
