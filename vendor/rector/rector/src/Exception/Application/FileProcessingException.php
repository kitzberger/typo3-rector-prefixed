<?php

declare (strict_types=1);
namespace Rector\Core\Exception\Application;

use Exception;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
use Throwable;
final class FileProcessingException extends \Exception
{
    public function __construct(\Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo, \Throwable $throwable)
    {
        $message = \sprintf('Processing file "%s" failed. %s%s', $smartFileInfo->getRealPath(), \PHP_EOL . \PHP_EOL, $throwable);
        parent::__construct($message);
    }
}
