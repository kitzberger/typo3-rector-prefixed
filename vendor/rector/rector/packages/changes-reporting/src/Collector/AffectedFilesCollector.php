<?php

declare (strict_types=1);
namespace Rector\ChangesReporting\Collector;

use Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileInfo;
final class AffectedFilesCollector
{
    /**
     * @var SmartFileInfo[]
     */
    private $affectedFiles = [];
    public function addFile(\Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        $this->affectedFiles[$fileInfo->getRealPath()] = $fileInfo;
    }
    public function getNext() : ?\Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileInfo
    {
        if ($this->affectedFiles !== []) {
            return \current($this->affectedFiles);
        }
        return null;
    }
    public function removeFromList(\Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : void
    {
        unset($this->affectedFiles[$fileInfo->getRealPath()]);
    }
}
