<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\SC_logout::class)) {
    return;
}
final class SC_logout
{
}
\class_alias('SC_logout', 'SC_logout', \false);
