<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_MVC_Exception_NoSuchCommand::class)) {
    return;
}
class Tx_Extbase_MVC_Exception_NoSuchCommand
{
}
\class_alias('Tx_Extbase_MVC_Exception_NoSuchCommand', 'Tx_Extbase_MVC_Exception_NoSuchCommand', \false);
