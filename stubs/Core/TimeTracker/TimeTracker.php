<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\TimeTracker\TimeTracker::class)) {
    return;
}
final class TimeTracker
{
    public function __construct($isEnabled = \true)
    {
    }
    public function setTSlogMessage($content, $num = 0) : void
    {
    }
}
