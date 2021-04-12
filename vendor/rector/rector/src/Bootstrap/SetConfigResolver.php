<?php

declare (strict_types=1);
namespace Rector\Core\Bootstrap;

use Typo3RectorPrefix20210412\Symfony\Component\Config\FileLocator;
use Typo3RectorPrefix20210412\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210412\Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo;
final class SetConfigResolver
{
    /**
     * @var string
     */
    private const SETS = 'sets';
    /**
     * @return SmartFileInfo[]
     */
    public function resolve(\Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : array
    {
        $containerBuilder = new \Typo3RectorPrefix20210412\Symfony\Component\DependencyInjection\ContainerBuilder();
        $phpFileLoader = new \Typo3RectorPrefix20210412\Symfony\Component\DependencyInjection\Loader\PhpFileLoader($containerBuilder, new \Typo3RectorPrefix20210412\Symfony\Component\Config\FileLocator());
        $phpFileLoader->load($smartFileInfo->getRealPath());
        if (!$containerBuilder->hasParameter(self::SETS)) {
            return [];
        }
        $sets = (array) $containerBuilder->getParameter(self::SETS);
        return $this->wrapToFileInfos($sets);
    }
    /**
     * @param string[] $sets
     * @return SmartFileInfo[]
     */
    private function wrapToFileInfos(array $sets) : array
    {
        $setFileInfos = [];
        foreach ($sets as $set) {
            $setFileInfos[] = new \Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo($set);
        }
        return $setFileInfos;
    }
}
