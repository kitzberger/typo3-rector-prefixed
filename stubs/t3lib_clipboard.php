<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\t3lib_clipboard::class)) {
    return;
}
class t3lib_clipboard
{
}
\class_alias('t3lib_clipboard', 't3lib_clipboard', \false);
