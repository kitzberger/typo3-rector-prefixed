<?php

namespace Typo3RectorPrefix20210422;

if (\interface_exists(\Typo3RectorPrefix20210422\Tx_Extbase_MVC_Controller_CommandControllerInterface::class)) {
    return;
}
interface Tx_Extbase_MVC_Controller_CommandControllerInterface
{
}
\class_alias('Tx_Extbase_MVC_Controller_CommandControllerInterface', 'Tx_Extbase_MVC_Controller_CommandControllerInterface', \false);
