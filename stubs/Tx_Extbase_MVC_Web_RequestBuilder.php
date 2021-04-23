<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_MVC_Web_RequestBuilder::class)) {
    return;
}
class Tx_Extbase_MVC_Web_RequestBuilder
{
}
\class_alias('Tx_Extbase_MVC_Web_RequestBuilder', 'Tx_Extbase_MVC_Web_RequestBuilder', \false);
