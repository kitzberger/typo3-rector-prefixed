<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Fluid_View_Exception_InvalidTemplateResourceException::class)) {
    return;
}
class Tx_Fluid_View_Exception_InvalidTemplateResourceException
{
}
\class_alias('Tx_Fluid_View_Exception_InvalidTemplateResourceException', 'Tx_Fluid_View_Exception_InvalidTemplateResourceException', \false);
