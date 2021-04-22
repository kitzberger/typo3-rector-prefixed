<?php

namespace Typo3RectorPrefix20210422;

if (\interface_exists(\Typo3RectorPrefix20210422\Tx_Fluid_Core_ViewHelper_ViewHelperInterface::class)) {
    return;
}
interface Tx_Fluid_Core_ViewHelper_ViewHelperInterface
{
}
\class_alias('Tx_Fluid_Core_ViewHelper_ViewHelperInterface', 'Tx_Fluid_Core_ViewHelper_ViewHelperInterface', \false);
