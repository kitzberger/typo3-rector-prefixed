<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\t3lib_mail_MailerAdapter::class)) {
    return;
}
final class t3lib_mail_MailerAdapter
{
}
\class_alias('t3lib_mail_MailerAdapter', 't3lib_mail_MailerAdapter', \false);
