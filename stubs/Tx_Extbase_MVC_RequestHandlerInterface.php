<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Extbase_MVC_RequestHandlerInterface::class)) {
    return;
}
interface Tx_Extbase_MVC_RequestHandlerInterface
{
}
\class_alias('Tx_Extbase_MVC_RequestHandlerInterface', 'Tx_Extbase_MVC_RequestHandlerInterface', \false);
