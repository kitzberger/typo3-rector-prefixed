<?php

namespace Typo3RectorPrefix20210422;

if (\interface_exists(\Typo3RectorPrefix20210422\Tx_Extbase_MVC_RequestInterface::class)) {
    return;
}
interface Tx_Extbase_MVC_RequestInterface
{
}
\class_alias('Tx_Extbase_MVC_RequestInterface', 'Tx_Extbase_MVC_RequestInterface', \false);
