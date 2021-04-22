<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\SC_browser::class)) {
    return;
}
final class SC_browser
{
}
\class_alias('SC_browser', 'SC_browser', \false);
