<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\SC_logout::class)) {
    return;
}
class SC_logout
{
}
\class_alias('SC_logout', 'SC_logout', \false);
