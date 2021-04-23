<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Fluid_Core_Rendering_RenderingContextInterface::class)) {
    return;
}
interface Tx_Fluid_Core_Rendering_RenderingContextInterface
{
}
\class_alias('Tx_Fluid_Core_Rendering_RenderingContextInterface', 'Tx_Fluid_Core_Rendering_RenderingContextInterface', \false);
