<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Fluid_Core_Rendering_RenderingContext::class)) {
    return;
}
class Tx_Fluid_Core_Rendering_RenderingContext
{
}
\class_alias('Tx_Fluid_Core_Rendering_RenderingContext', 'Tx_Fluid_Core_Rendering_RenderingContext', \false);
