<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409;

if (\class_exists(\Typo3RectorPrefix20210409\Swift_Image::class)) {
    return;
}
class Swift_Image
{
    public static function fromPath(string $string) : string
    {
        return 'foo';
    }
}
\class_alias('Swift_Image', 'Swift_Image', \false);
