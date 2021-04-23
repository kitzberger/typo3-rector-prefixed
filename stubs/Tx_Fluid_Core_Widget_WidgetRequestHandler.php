<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Fluid_Core_Widget_WidgetRequestHandler::class)) {
    return;
}
class Tx_Fluid_Core_Widget_WidgetRequestHandler
{
}
\class_alias('Tx_Fluid_Core_Widget_WidgetRequestHandler', 'Tx_Fluid_Core_Widget_WidgetRequestHandler', \false);
