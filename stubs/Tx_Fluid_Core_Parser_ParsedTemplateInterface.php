<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Fluid_Core_Parser_ParsedTemplateInterface::class)) {
    return;
}
interface Tx_Fluid_Core_Parser_ParsedTemplateInterface
{
}
\class_alias('Tx_Fluid_Core_Parser_ParsedTemplateInterface', 'Tx_Fluid_Core_Parser_ParsedTemplateInterface', \false);
