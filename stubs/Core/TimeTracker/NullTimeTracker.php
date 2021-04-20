<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\TimeTracker\NullTimeTracker::class)) {
    return;
}
final class NullTimeTracker
{
}
