<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\TimeTracker;

if (\class_exists(\TYPO3\CMS\Core\TimeTracker\NullTimeTracker::class)) {
    return;
}
class NullTimeTracker
{
}
