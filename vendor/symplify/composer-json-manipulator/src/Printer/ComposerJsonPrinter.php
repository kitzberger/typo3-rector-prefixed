<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420\Symplify\ComposerJsonManipulator\Printer;

use Typo3RectorPrefix20210420\Symplify\ComposerJsonManipulator\FileSystem\JsonFileManager;
use Typo3RectorPrefix20210420\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson;
use Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo;
final class ComposerJsonPrinter
{
    /**
     * @var JsonFileManager
     */
    private $jsonFileManager;
    public function __construct(\Typo3RectorPrefix20210420\Symplify\ComposerJsonManipulator\FileSystem\JsonFileManager $jsonFileManager)
    {
        $this->jsonFileManager = $jsonFileManager;
    }
    public function printToString(\Typo3RectorPrefix20210420\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $composerJson) : string
    {
        return $this->jsonFileManager->encodeJsonToFileContent($composerJson->getJsonArray());
    }
    /**
     * @param string|SmartFileInfo $targetFile
     */
    public function print(\Typo3RectorPrefix20210420\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $composerJson, $targetFile) : string
    {
        if (\is_string($targetFile)) {
            return $this->jsonFileManager->printComposerJsonToFilePath($composerJson, $targetFile);
        }
        return $this->jsonFileManager->printJsonToFileInfo($composerJson->getJsonArray(), $targetFile);
    }
}
