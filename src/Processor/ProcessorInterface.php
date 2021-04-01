<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Processor;

use Typo3RectorPrefix20210401\Symplify\SmartFileSystem\SmartFileInfo;
interface ProcessorInterface
{
    public function process(\Typo3RectorPrefix20210401\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : ?string;
    public function canProcess(\Typo3RectorPrefix20210401\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : bool;
    /**
     * @return string[]
     */
    public function allowedFileExtensions() : array;
}
