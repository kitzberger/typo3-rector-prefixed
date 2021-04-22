<?php

namespace Typo3RectorPrefix20210422;

if (\interface_exists(\Typo3RectorPrefix20210422\Tx_Extbase_Core_BootstrapInterface::class)) {
    return;
}
interface Tx_Extbase_Core_BootstrapInterface
{
}
\class_alias('Tx_Extbase_Core_BootstrapInterface', 'Tx_Extbase_Core_BootstrapInterface', \false);
