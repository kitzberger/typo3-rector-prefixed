<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\Tx_Extbase_MVC_Dispatcher::class)) {
    return;
}
final class Tx_Extbase_MVC_Dispatcher
{
}
\class_alias('Tx_Extbase_MVC_Dispatcher', 'Tx_Extbase_MVC_Dispatcher', \false);
