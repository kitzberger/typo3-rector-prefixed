<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\TBE_browser_recordList::class)) {
    return;
}
class TBE_browser_recordList
{
}
\class_alias('TBE_browser_recordList', 'TBE_browser_recordList', \false);
