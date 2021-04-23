<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_MVC_Exception_InvalidRequestType::class)) {
    return;
}
class Tx_Extbase_MVC_Exception_InvalidRequestType
{
}
\class_alias('Tx_Extbase_MVC_Exception_InvalidRequestType', 'Tx_Extbase_MVC_Exception_InvalidRequestType', \false);
