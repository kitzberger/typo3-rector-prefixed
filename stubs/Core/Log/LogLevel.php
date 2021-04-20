<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Log\LogLevel::class)) {
    return null;
}
final class LogLevel
{
    const EMERGENCY = 0;
    const ALERT = 1;
    const CRITICAL = 2;
    const ERROR = 3;
    const WARNING = 4;
    const NOTICE = 5;
    const INFO = 6;
    const DEBUG = 7;
}
