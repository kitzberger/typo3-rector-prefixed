<?php

declare (strict_types=1);
namespace Rector\Caching\Application;

use Rector\Caching\Detector\ChangedFilesDetector;
use Rector\Caching\UnchangedFilesFilter;
use Rector\Core\Configuration\Configuration;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
final class CachedFileInfoFilterAndReporter
{
    /**
     * @var Configuration
     */
    private $configuration;
    /**
     * @var ChangedFilesDetector
     */
    private $changedFilesDetector;
    /**
     * @var UnchangedFilesFilter
     */
    private $unchangedFilesFilter;
    public function __construct(\Rector\Core\Configuration\Configuration $configuration, \Rector\Caching\Detector\ChangedFilesDetector $changedFilesDetector, \Rector\Caching\UnchangedFilesFilter $unchangedFilesFilter)
    {
        $this->configuration = $configuration;
        $this->changedFilesDetector = $changedFilesDetector;
        $this->unchangedFilesFilter = $unchangedFilesFilter;
    }
    /**
     * @param SmartFileInfo[] $phpFileInfos
     * @return SmartFileInfo[]
     */
    public function filterFileInfos(array $phpFileInfos) : array
    {
        if (!$this->configuration->isCacheEnabled()) {
            return $phpFileInfos;
        }
        // cache stuff
        if ($this->configuration->shouldClearCache()) {
            $this->changedFilesDetector->clear();
        }
        return $this->unchangedFilesFilter->filterAndJoinWithDependentFileInfos($phpFileInfos);
    }
}
