<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\Tx_Extbase_MVC_ResponseInterface::class)) {
    return;
}
interface Tx_Extbase_MVC_ResponseInterface
{
}
\class_alias('Tx_Extbase_MVC_ResponseInterface', 'Tx_Extbase_MVC_ResponseInterface', \false);
