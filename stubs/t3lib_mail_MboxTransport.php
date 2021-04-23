<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\t3lib_mail_MboxTransport::class)) {
    return;
}
class t3lib_mail_MboxTransport
{
}
\class_alias('t3lib_mail_MboxTransport', 't3lib_mail_MboxTransport', \false);
