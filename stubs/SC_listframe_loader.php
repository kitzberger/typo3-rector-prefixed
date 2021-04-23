<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\SC_listframe_loader::class)) {
    return;
}
class SC_listframe_loader
{
}
\class_alias('SC_listframe_loader', 'SC_listframe_loader', \false);
