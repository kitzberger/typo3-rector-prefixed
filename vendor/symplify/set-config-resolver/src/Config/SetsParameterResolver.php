<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210405\Symplify\SetConfigResolver\Config;

use Typo3RectorPrefix20210405\Symfony\Component\Config\FileLocator;
use Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Typo3RectorPrefix20210405\Symplify\Astral\Exception\ShouldNotHappenException;
use Typo3RectorPrefix20210405\Symplify\SetConfigResolver\SetResolver;
use Typo3RectorPrefix20210405\Symplify\SmartFileSystem\SmartFileInfo;
final class SetsParameterResolver
{
    /**
     * @var string
     */
    private const SETS = 'sets';
    /**
     * @var SetResolver
     */
    private $setResolver;
    public function __construct(\Typo3RectorPrefix20210405\Symplify\SetConfigResolver\SetResolver $setResolver)
    {
        $this->setResolver = $setResolver;
    }
    /**
     * @param SmartFileInfo[] $fileInfos
     * @return SmartFileInfo[]
     */
    public function resolveFromFileInfos(array $fileInfos) : array
    {
        $setFileInfos = [];
        foreach ($fileInfos as $fileInfo) {
            $setsNames = $this->resolveSetsFromFileInfo($fileInfo);
            foreach ($setsNames as $setsName) {
                $setFileInfos[] = $this->setResolver->detectFromName($setsName);
            }
        }
        return $setFileInfos;
    }
    /**
     * @return string[]
     */
    private function resolveSetsFromFileInfo(\Typo3RectorPrefix20210405\Symplify\SmartFileSystem\SmartFileInfo $configFileInfo) : array
    {
        if ($configFileInfo->hasSuffixes(['yml', 'yaml'])) {
            throw new \Typo3RectorPrefix20210405\Symplify\Astral\Exception\ShouldNotHappenException('Only PHP config suffix is supported now. Migrete your Symfony config to PHP');
        }
        return $this->resolveSetsParameterFromPhpFileInfo($configFileInfo);
    }
    /**
     * @return string[]
     */
    private function resolveSetsParameterFromPhpFileInfo(\Typo3RectorPrefix20210405\Symplify\SmartFileSystem\SmartFileInfo $configFileInfo) : array
    {
        // php file loader
        $containerBuilder = new \Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\ContainerBuilder();
        $phpFileLoader = new \Typo3RectorPrefix20210405\Symfony\Component\DependencyInjection\Loader\PhpFileLoader($containerBuilder, new \Typo3RectorPrefix20210405\Symfony\Component\Config\FileLocator());
        $phpFileLoader->load($configFileInfo->getRealPath());
        if (!$containerBuilder->hasParameter(self::SETS)) {
            return [];
        }
        return (array) $containerBuilder->getParameter(self::SETS);
    }
}
