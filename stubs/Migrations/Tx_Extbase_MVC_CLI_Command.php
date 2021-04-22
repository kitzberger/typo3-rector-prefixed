<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\Tx_Extbase_MVC_CLI_Command::class)) {
    return;
}
final class Tx_Extbase_MVC_CLI_Command
{
}
\class_alias('Tx_Extbase_MVC_CLI_Command', 'Tx_Extbase_MVC_CLI_Command', \false);
