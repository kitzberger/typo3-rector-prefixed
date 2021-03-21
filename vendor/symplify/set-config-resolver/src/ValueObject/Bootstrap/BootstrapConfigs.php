<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210321\Symplify\SetConfigResolver\ValueObject\Bootstrap;

use Typo3RectorPrefix20210321\Symplify\SmartFileSystem\SmartFileInfo;
final class BootstrapConfigs
{
    /**
     * @var SmartFileInfo|null
     */
    private $mainConfigFileInfo;
    /**
     * @var SmartFileInfo[]
     */
    private $setConfigFileInfos = [];
    /**
     * @param SmartFileInfo[] $setConfigFileInfos
     */
    public function __construct(?\Typo3RectorPrefix20210321\Symplify\SmartFileSystem\SmartFileInfo $mainConfigFileInfo, array $setConfigFileInfos)
    {
        $this->mainConfigFileInfo = $mainConfigFileInfo;
        $this->setConfigFileInfos = $setConfigFileInfos;
    }
    public function getMainConfigFileInfo() : ?\Typo3RectorPrefix20210321\Symplify\SmartFileSystem\SmartFileInfo
    {
        return $this->mainConfigFileInfo;
    }
    /**
     * @return SmartFileInfo[]
     */
    public function getConfigFileInfos() : array
    {
        if (!$this->mainConfigFileInfo instanceof \Typo3RectorPrefix20210321\Symplify\SmartFileSystem\SmartFileInfo) {
            return $this->setConfigFileInfos;
        }
        return \array_merge($this->setConfigFileInfos, [$this->mainConfigFileInfo]);
    }
}
