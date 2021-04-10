<?php

declare (strict_types=1);
namespace Rector\Core\ValueObject\Bootstrap;

use Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo;
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
    public function __construct(?\Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo $mainConfigFileInfo, array $setConfigFileInfos)
    {
        $this->mainConfigFileInfo = $mainConfigFileInfo;
        $this->setConfigFileInfos = $setConfigFileInfos;
    }
    public function getMainConfigFileInfo() : ?\Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo
    {
        return $this->mainConfigFileInfo;
    }
    /**
     * @return SmartFileInfo[]
     */
    public function getConfigFileInfos() : array
    {
        $configFileInfos = [];
        if ($this->mainConfigFileInfo !== null) {
            $configFileInfos[] = $this->mainConfigFileInfo;
        }
        return \array_merge($configFileInfos, $this->setConfigFileInfos);
    }
}
