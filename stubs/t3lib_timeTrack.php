<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\t3lib_timeTrack::class)) {
    return;
}
class t3lib_timeTrack
{
}
\class_alias('t3lib_timeTrack', 't3lib_timeTrack', \false);
