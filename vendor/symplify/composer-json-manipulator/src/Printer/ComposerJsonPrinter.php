<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210326\Symplify\ComposerJsonManipulator\Printer;

use Typo3RectorPrefix20210326\Symplify\ComposerJsonManipulator\FileSystem\JsonFileManager;
use Typo3RectorPrefix20210326\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson;
use Typo3RectorPrefix20210326\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210326\Symplify\SymplifyKernel\Exception\ShouldNotHappenException;
final class ComposerJsonPrinter
{
    /**
     * @var JsonFileManager
     */
    private $jsonFileManager;
    public function __construct(\Typo3RectorPrefix20210326\Symplify\ComposerJsonManipulator\FileSystem\JsonFileManager $jsonFileManager)
    {
        $this->jsonFileManager = $jsonFileManager;
    }
    public function printToString(\Typo3RectorPrefix20210326\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $composerJson) : string
    {
        return $this->jsonFileManager->encodeJsonToFileContent($composerJson->getJsonArray());
    }
    /**
     * @param string|SmartFileInfo $targetFile
     */
    public function print(\Typo3RectorPrefix20210326\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $composerJson, $targetFile) : string
    {
        if (\is_string($targetFile)) {
            return $this->jsonFileManager->printComposerJsonToFilePath($composerJson, $targetFile);
        }
        if (!$targetFile instanceof \Typo3RectorPrefix20210326\Symplify\SmartFileSystem\SmartFileInfo) {
            throw new \Typo3RectorPrefix20210326\Symplify\SymplifyKernel\Exception\ShouldNotHappenException();
        }
        return $this->jsonFileManager->printJsonToFileInfo($composerJson->getJsonArray(), $targetFile);
    }
}
