<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210321\Jean85\Exception;

class ReplacedPackageException extends \Exception implements \Typo3RectorPrefix20210321\Jean85\Exception\VersionMissingExceptionInterface
{
    public static function create(string $packageName) : \Typo3RectorPrefix20210321\Jean85\Exception\VersionMissingExceptionInterface
    {
        return new self('Cannot retrieve a version for package ' . $packageName . ' since it is replaced by some other package');
    }
}
