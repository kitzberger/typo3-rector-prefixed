<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_MVC_Exception_InvalidControllerName::class)) {
    return;
}
class Tx_Extbase_MVC_Exception_InvalidControllerName
{
}
\class_alias('Tx_Extbase_MVC_Exception_InvalidControllerName', 'Tx_Extbase_MVC_Exception_InvalidControllerName', \false);
