<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\Tx_Extbase_MVC_Exception_InvalidOrNoRequestHash::class)) {
    return;
}
final class Tx_Extbase_MVC_Exception_InvalidOrNoRequestHash
{
}
\class_alias('Tx_Extbase_MVC_Exception_InvalidOrNoRequestHash', 'Tx_Extbase_MVC_Exception_InvalidOrNoRequestHash', \false);
