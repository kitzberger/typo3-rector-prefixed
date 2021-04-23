<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\SC_dummy::class)) {
    return;
}
class SC_dummy
{
}
\class_alias('SC_dummy', 'SC_dummy', \false);
