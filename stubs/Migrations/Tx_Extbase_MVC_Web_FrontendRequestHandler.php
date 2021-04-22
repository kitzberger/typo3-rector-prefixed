<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\Tx_Extbase_MVC_Web_FrontendRequestHandler::class)) {
    return;
}
final class Tx_Extbase_MVC_Web_FrontendRequestHandler
{
}
\class_alias('Tx_Extbase_MVC_Web_FrontendRequestHandler', 'Tx_Extbase_MVC_Web_FrontendRequestHandler', \false);
