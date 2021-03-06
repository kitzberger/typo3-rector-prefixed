<?php

declare (strict_types=1);
namespace Rector\PHPUnit\Composer;

use Typo3RectorPrefix20210423\Nette\Utils\Arrays;
use Typo3RectorPrefix20210423\Nette\Utils\Json;
use Rector\Testing\PHPUnit\StaticPHPUnitEnvironment;
use Typo3RectorPrefix20210423\Symplify\ComposerJsonManipulator\ValueObject\ComposerJsonSection;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileSystem;
final class ComposerAutoloadedDirectoryProvider
{
    /**
     * @var string[]
     */
    private const AUTOLOAD_SECTIONS = [\Typo3RectorPrefix20210423\Symplify\ComposerJsonManipulator\ValueObject\ComposerJsonSection::AUTOLOAD, \Typo3RectorPrefix20210423\Symplify\ComposerJsonManipulator\ValueObject\ComposerJsonSection::AUTOLOAD_DEV];
    /**
     * @var string
     */
    private $composerFilePath;
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    public function __construct(\Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileSystem $smartFileSystem)
    {
        $this->composerFilePath = \getcwd() . '/composer.json';
        $this->smartFileSystem = $smartFileSystem;
    }
    /**
     * @return string[]|mixed[]
     */
    public function provide() : array
    {
        // @todo use paths parameter?
        if (\Rector\Testing\PHPUnit\StaticPHPUnitEnvironment::isPHPUnitRun()) {
            return [\getcwd() . '/src', \getcwd() . '/tests'];
        }
        $composerJson = $this->loadComposerJsonArray();
        $autoloadDirectories = [];
        foreach (self::AUTOLOAD_SECTIONS as $autoloadSection) {
            if (!isset($composerJson[$autoloadSection])) {
                continue;
            }
            $sectionDirectories = $this->collectDirectoriesFromAutoload($composerJson[$autoloadSection]);
            $autoloadDirectories[] = $sectionDirectories;
        }
        return \Typo3RectorPrefix20210423\Nette\Utils\Arrays::flatten($autoloadDirectories);
    }
    /**
     * @return mixed[]
     */
    private function loadComposerJsonArray() : array
    {
        if (!\file_exists($this->composerFilePath)) {
            return [];
        }
        $composerFileContent = $this->smartFileSystem->readFile($this->composerFilePath);
        return \Typo3RectorPrefix20210423\Nette\Utils\Json::decode($composerFileContent, \Typo3RectorPrefix20210423\Nette\Utils\Json::FORCE_ARRAY);
    }
    /**
     * @param string[] $composerJsonAutoload
     * @return string[]
     */
    private function collectDirectoriesFromAutoload(array $composerJsonAutoload) : array
    {
        $autoloadDirectories = [];
        if (isset($composerJsonAutoload['psr-4'])) {
            /** @var string[] $psr4 */
            $psr4 = $composerJsonAutoload['psr-4'];
            $autoloadDirectories = \array_merge($autoloadDirectories, $psr4);
        }
        if (isset($composerJsonAutoload['classmap'])) {
            /** @var string[] $classmap */
            $classmap = $composerJsonAutoload['classmap'];
            foreach ($classmap as $singleClassmap) {
                $singleClassmap = \getcwd() . '/' . $singleClassmap;
                // skip file, we look only for directories
                if (\file_exists($singleClassmap)) {
                    continue;
                }
                $autoloadDirectories[] = $singleClassmap;
            }
        }
        return \array_values($autoloadDirectories);
    }
}
