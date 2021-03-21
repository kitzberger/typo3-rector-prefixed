<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210321\Symplify\SmartFileSystem\Json;

use Typo3RectorPrefix20210321\Nette\Utils\Arrays;
use Typo3RectorPrefix20210321\Nette\Utils\Json;
use Typo3RectorPrefix20210321\Symplify\SmartFileSystem\FileSystemGuard;
use Typo3RectorPrefix20210321\Symplify\SmartFileSystem\SmartFileSystem;
/**
 * @see \Symplify\SmartFileSystem\Tests\Json\JsonFileSystem\JsonFileSystemTest
 */
final class JsonFileSystem
{
    /**
     * @var FileSystemGuard
     */
    private $fileSystemGuard;
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    public function __construct(\Typo3RectorPrefix20210321\Symplify\SmartFileSystem\FileSystemGuard $fileSystemGuard, \Typo3RectorPrefix20210321\Symplify\SmartFileSystem\SmartFileSystem $smartFileSystem)
    {
        $this->fileSystemGuard = $fileSystemGuard;
        $this->smartFileSystem = $smartFileSystem;
    }
    /**
     * @return mixed[]
     */
    public function loadFilePathToJson(string $filePath) : array
    {
        $this->fileSystemGuard->ensureFileExists($filePath, __METHOD__);
        $fileContent = $this->smartFileSystem->readFile($filePath);
        return \Typo3RectorPrefix20210321\Nette\Utils\Json::decode($fileContent, \Typo3RectorPrefix20210321\Nette\Utils\Json::FORCE_ARRAY);
    }
    /**
     * @param array<string, mixed> $jsonArray
     */
    public function writeJsonToFilePath(array $jsonArray, string $filePath) : void
    {
        $jsonContent = \Typo3RectorPrefix20210321\Nette\Utils\Json::encode($jsonArray, \Typo3RectorPrefix20210321\Nette\Utils\Json::PRETTY) . \PHP_EOL;
        $this->smartFileSystem->dumpFile($filePath, $jsonContent);
    }
    /**
     * @param array<string, mixed> $newJsonArray
     */
    public function mergeArrayToJsonFile(string $filePath, array $newJsonArray) : void
    {
        $jsonArray = $this->loadFilePathToJson($filePath);
        $newComposerJsonArray = \Typo3RectorPrefix20210321\Nette\Utils\Arrays::mergeTree($jsonArray, $newJsonArray);
        $this->writeJsonToFilePath($newComposerJsonArray, $filePath);
    }
}
