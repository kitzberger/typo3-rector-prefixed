<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\Tx_Extbase_MVC_Web_AbstractRequestHandler::class)) {
    return;
}
final class Tx_Extbase_MVC_Web_AbstractRequestHandler
{
}
\class_alias('Tx_Extbase_MVC_Web_AbstractRequestHandler', 'Tx_Extbase_MVC_Web_AbstractRequestHandler', \false);
