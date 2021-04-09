<?php

namespace Typo3RectorPrefix20210409\Carbon;

use DateInterval;
use DateTimeInterface;
use DateTimeZone;
if (\class_exists('Typo3RectorPrefix20210409\\Carbon\\Carbon')) {
    return;
}
class Carbon extends \DateTime
{
    public static function now() : self
    {
        return new self();
    }
    public static function today() : self
    {
        return new self();
    }
    public function subDays(int $days) : self
    {
        return $this;
    }
}