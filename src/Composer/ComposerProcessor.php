<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Composer;

use Rector\ChangesReporting\Application\ErrorAndDiffCollector;
use Rector\Core\Configuration\Configuration;
use Typo3RectorPrefix20210329\Symplify\ComposerJsonManipulator\ComposerJsonFactory;
use Typo3RectorPrefix20210329\Symplify\ComposerJsonManipulator\Printer\ComposerJsonPrinter;
use Typo3RectorPrefix20210329\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson;
use Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileSystem;
final class ComposerProcessor
{
    /**
     * @var ComposerJsonFactory
     */
    private $composerJsonFactory;
    /**
     * @var ComposerJsonPrinter
     */
    private $composerJsonPrinter;
    /**
     * @var Configuration
     */
    private $configuration;
    /**
     * @var ErrorAndDiffCollector
     */
    private $errorAndDiffCollector;
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    /**
     * @var ComposerModifier
     */
    private $composerModifier;
    public function __construct(\Typo3RectorPrefix20210329\Symplify\ComposerJsonManipulator\ComposerJsonFactory $composerJsonFactory, \Typo3RectorPrefix20210329\Symplify\ComposerJsonManipulator\Printer\ComposerJsonPrinter $composerJsonPrinter, \Rector\Core\Configuration\Configuration $configuration, \Rector\ChangesReporting\Application\ErrorAndDiffCollector $errorAndDiffCollector, \Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileSystem $smartFileSystem, \Ssch\TYPO3Rector\Composer\ComposerModifier $composerModifier)
    {
        $this->composerJsonFactory = $composerJsonFactory;
        $this->composerJsonPrinter = $composerJsonPrinter;
        $this->configuration = $configuration;
        $this->errorAndDiffCollector = $errorAndDiffCollector;
        $this->smartFileSystem = $smartFileSystem;
        $this->composerModifier = $composerModifier;
    }
    public function process(string $composerJsonFilePath) : void
    {
        if (!$this->smartFileSystem->exists($composerJsonFilePath)) {
            return;
        }
        // to avoid modification of file
        if (!$this->composerModifier->enabled()) {
            return;
        }
        $smartFileInfo = new \Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileInfo($composerJsonFilePath);
        $composerJson = $this->composerJsonFactory->createFromFileInfo($smartFileInfo);
        $oldComposerJson = clone $composerJson;
        $this->composerModifier->modify($composerJson);
        // nothing has changed
        if ($oldComposerJson->getJsonArray() === $composerJson->getJsonArray()) {
            return;
        }
        $this->addComposerJsonFileDiff($oldComposerJson, $composerJson, $smartFileInfo);
        $this->reportFileContentChange($composerJson, $smartFileInfo);
    }
    private function addComposerJsonFileDiff(\Typo3RectorPrefix20210329\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $oldComposerJson, \Typo3RectorPrefix20210329\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $newComposerJson, \Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : void
    {
        $newContents = $this->composerJsonPrinter->printToString($newComposerJson);
        $oldContents = $this->composerJsonPrinter->printToString($oldComposerJson);
        $this->errorAndDiffCollector->addFileDiff($smartFileInfo, $newContents, $oldContents);
    }
    private function reportFileContentChange(\Typo3RectorPrefix20210329\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $composerJson, \Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : void
    {
        if ($this->configuration->isDryRun()) {
            return;
        }
        $this->composerJsonPrinter->print($composerJson, $smartFileInfo);
    }
}
