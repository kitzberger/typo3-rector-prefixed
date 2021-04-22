<?php

namespace Typo3RectorPrefix20210422;

if (\interface_exists(\Typo3RectorPrefix20210422\Tx_Extbase_MVC_Controller_ControllerInterface::class)) {
    return;
}
interface Tx_Extbase_MVC_Controller_ControllerInterface
{
}
\class_alias('Tx_Extbase_MVC_Controller_ControllerInterface', 'Tx_Extbase_MVC_Controller_ControllerInterface', \false);
