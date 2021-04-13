<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210413;

if (\class_exists(\Typo3RectorPrefix20210413\Swift_Attachment::class)) {
    return;
}
class Swift_Attachment
{
    public static function fromPath(string $string) : string
    {
        return 'foo';
    }
}
\class_alias('Swift_Attachment', 'Swift_Attachment', \false);
