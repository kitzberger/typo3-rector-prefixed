<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\SC_browser::class)) {
    return;
}
class SC_browser
{
}
\class_alias('SC_browser', 'SC_browser', \false);
