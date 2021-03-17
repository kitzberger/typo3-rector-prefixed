<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210317\Symplify\ComposerJsonManipulator\FileSystem;

use Typo3RectorPrefix20210317\Nette\Utils\Json;
use Typo3RectorPrefix20210317\Symplify\ComposerJsonManipulator\Json\JsonCleaner;
use Typo3RectorPrefix20210317\Symplify\ComposerJsonManipulator\Json\JsonInliner;
use Typo3RectorPrefix20210317\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson;
use Typo3RectorPrefix20210317\Symplify\PackageBuilder\Configuration\StaticEolConfiguration;
use Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileSystem;
/**
 * @see \Symplify\MonorepoBuilder\Tests\FileSystem\JsonFileManager\JsonFileManagerTest
 */
final class JsonFileManager
{
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    /**
     * @var JsonCleaner
     */
    private $jsonCleaner;
    /**
     * @var JsonInliner
     */
    private $jsonInliner;
    /**
     * @var mixed[]
     */
    private $cachedJSONFiles = [];
    public function __construct(\Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileSystem $smartFileSystem, \Typo3RectorPrefix20210317\Symplify\ComposerJsonManipulator\Json\JsonCleaner $jsonCleaner, \Typo3RectorPrefix20210317\Symplify\ComposerJsonManipulator\Json\JsonInliner $jsonInliner)
    {
        $this->smartFileSystem = $smartFileSystem;
        $this->jsonCleaner = $jsonCleaner;
        $this->jsonInliner = $jsonInliner;
    }
    /**
     * @return mixed[]
     */
    public function loadFromFileInfo(\Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : array
    {
        $realPath = $smartFileInfo->getRealPath();
        if (!isset($this->cachedJSONFiles[$realPath])) {
            $this->cachedJSONFiles[$realPath] = \Typo3RectorPrefix20210317\Nette\Utils\Json::decode($smartFileInfo->getContents(), \Typo3RectorPrefix20210317\Nette\Utils\Json::FORCE_ARRAY);
        }
        return $this->cachedJSONFiles[$realPath];
    }
    /**
     * @return mixed[]
     */
    public function loadFromFilePath(string $filePath) : array
    {
        $fileContent = $this->smartFileSystem->readFile($filePath);
        return \Typo3RectorPrefix20210317\Nette\Utils\Json::decode($fileContent, \Typo3RectorPrefix20210317\Nette\Utils\Json::FORCE_ARRAY);
    }
    /**
     * @param mixed[] $json
     */
    public function printJsonToFileInfo(array $json, \Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : string
    {
        $jsonString = $this->encodeJsonToFileContent($json);
        $this->smartFileSystem->dumpFile($smartFileInfo->getPathname(), $jsonString);
        return $jsonString;
    }
    public function printComposerJsonToFilePath(\Typo3RectorPrefix20210317\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $composerJson, string $filePath) : string
    {
        $jsonString = $this->encodeJsonToFileContent($composerJson->getJsonArray());
        $this->smartFileSystem->dumpFile($filePath, $jsonString);
        return $jsonString;
    }
    /**
     * @param mixed[] $json
     */
    public function encodeJsonToFileContent(array $json) : string
    {
        // Empty arrays may lead to bad encoding since we can't be sure whether they need to be arrays or objects.
        $json = $this->jsonCleaner->removeEmptyKeysFromJsonArray($json);
        $jsonContent = \Typo3RectorPrefix20210317\Nette\Utils\Json::encode($json, \Typo3RectorPrefix20210317\Nette\Utils\Json::PRETTY) . \Typo3RectorPrefix20210317\Symplify\PackageBuilder\Configuration\StaticEolConfiguration::getEolChar();
        return $this->jsonInliner->inlineSections($jsonContent);
    }
}
