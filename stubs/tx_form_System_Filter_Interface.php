<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\tx_form_System_Filter_Interface::class)) {
    return;
}
interface tx_form_System_Filter_Interface
{
}
\class_alias('tx_form_System_Filter_Interface', 'tx_form_System_Filter_Interface', \false);
