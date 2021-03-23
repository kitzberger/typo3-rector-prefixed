<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210323\Jean85\Exception;

interface VersionMissingExceptionInterface extends \Throwable
{
    public static function create(string $packageName) : self;
}
