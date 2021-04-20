<?php

declare (strict_types=1);


if (\class_exists(\Typo3RectorPrefix20210420\Swift_Attachment::class)) {
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
