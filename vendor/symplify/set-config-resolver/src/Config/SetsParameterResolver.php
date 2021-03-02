<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210302\Symplify\SetConfigResolver\Config;

use Typo3RectorPrefix20210302\Symfony\Component\Config\FileLocator;
use Typo3RectorPrefix20210302\Symfony\Component\DependencyInjection\ContainerBuilder;
use Typo3RectorPrefix20210302\Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Typo3RectorPrefix20210302\Symfony\Component\Yaml\Yaml;
use Typo3RectorPrefix20210302\Symplify\SetConfigResolver\SetResolver;
use Typo3RectorPrefix20210302\Symplify\SmartFileSystem\SmartFileInfo;
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
    public function __construct(\Typo3RectorPrefix20210302\Symplify\SetConfigResolver\SetResolver $setResolver)
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
    private function resolveSetsFromFileInfo(\Typo3RectorPrefix20210302\Symplify\SmartFileSystem\SmartFileInfo $configFileInfo) : array
    {
        if ($configFileInfo->hasSuffixes(['yml', 'yaml'])) {
            return $this->resolveSetsParameterFromYamlFileInfo($configFileInfo);
        }
        return $this->resolveSetsParameterFromPhpFileInfo($configFileInfo);
    }
    /**
     * @return string[]
     */
    private function resolveSetsParameterFromYamlFileInfo(\Typo3RectorPrefix20210302\Symplify\SmartFileSystem\SmartFileInfo $configFileInfo) : array
    {
        $configContent = \Typo3RectorPrefix20210302\Symfony\Component\Yaml\Yaml::parse($configFileInfo->getContents());
        return (array) ($configContent['parameters'][self::SETS] ?? []);
    }
    /**
     * @return string[]
     */
    private function resolveSetsParameterFromPhpFileInfo(\Typo3RectorPrefix20210302\Symplify\SmartFileSystem\SmartFileInfo $configFileInfo) : array
    {
        // php file loader
        $containerBuilder = new \Typo3RectorPrefix20210302\Symfony\Component\DependencyInjection\ContainerBuilder();
        $phpFileLoader = new \Typo3RectorPrefix20210302\Symfony\Component\DependencyInjection\Loader\PhpFileLoader($containerBuilder, new \Typo3RectorPrefix20210302\Symfony\Component\Config\FileLocator());
        $phpFileLoader->load($configFileInfo->getRealPath());
        if (!$containerBuilder->hasParameter(self::SETS)) {
            return [];
        }
        return (array) $containerBuilder->getParameter(self::SETS);
    }
}
