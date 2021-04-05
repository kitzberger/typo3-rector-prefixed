<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Composer;

use Rector\ChangesReporting\Application\ErrorAndDiffCollector;
use Rector\Core\Configuration\Configuration;
use Ssch\TYPO3Rector\Processor\ProcessorInterface;
use Typo3RectorPrefix20210405\Symplify\ComposerJsonManipulator\ComposerJsonFactory;
use Typo3RectorPrefix20210405\Symplify\ComposerJsonManipulator\Printer\ComposerJsonPrinter;
use Typo3RectorPrefix20210405\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson;
use Typo3RectorPrefix20210405\Symplify\SmartFileSystem\SmartFileInfo;
final class ComposerProcessor implements \Ssch\TYPO3Rector\Processor\ProcessorInterface
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
     * @var ComposerModifier
     */
    private $composerModifier;
    public function __construct(\Typo3RectorPrefix20210405\Symplify\ComposerJsonManipulator\ComposerJsonFactory $composerJsonFactory, \Typo3RectorPrefix20210405\Symplify\ComposerJsonManipulator\Printer\ComposerJsonPrinter $composerJsonPrinter, \Rector\Core\Configuration\Configuration $configuration, \Rector\ChangesReporting\Application\ErrorAndDiffCollector $errorAndDiffCollector, \Ssch\TYPO3Rector\Composer\ComposerModifier $composerModifier)
    {
        $this->composerJsonFactory = $composerJsonFactory;
        $this->composerJsonPrinter = $composerJsonPrinter;
        $this->configuration = $configuration;
        $this->errorAndDiffCollector = $errorAndDiffCollector;
        $this->composerModifier = $composerModifier;
    }
    public function process(\Typo3RectorPrefix20210405\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : ?string
    {
        // to avoid modification of file
        if (!$this->composerModifier->enabled()) {
            return null;
        }
        $composerJson = $this->composerJsonFactory->createFromFileInfo($smartFileInfo);
        $oldComposerJson = clone $composerJson;
        $this->composerModifier->modify($composerJson);
        // nothing has changed
        if ($oldComposerJson->getJsonArray() === $composerJson->getJsonArray()) {
            return null;
        }
        $this->addComposerJsonFileDiff($oldComposerJson, $composerJson, $smartFileInfo);
        $this->reportFileContentChange($composerJson, $smartFileInfo);
        return null;
    }
    public function canProcess(\Typo3RectorPrefix20210405\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : bool
    {
        return \in_array($smartFileInfo->getExtension(), $this->allowedFileExtensions(), \true);
    }
    /**
     * @return string[]
     */
    public function allowedFileExtensions() : array
    {
        return ['json'];
    }
    private function addComposerJsonFileDiff(\Typo3RectorPrefix20210405\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $oldComposerJson, \Typo3RectorPrefix20210405\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $newComposerJson, \Typo3RectorPrefix20210405\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : void
    {
        $newContents = $this->composerJsonPrinter->printToString($newComposerJson);
        $oldContents = $this->composerJsonPrinter->printToString($oldComposerJson);
        $this->errorAndDiffCollector->addFileDiff($smartFileInfo, $newContents, $oldContents);
    }
    private function reportFileContentChange(\Typo3RectorPrefix20210405\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $composerJson, \Typo3RectorPrefix20210405\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : void
    {
        if ($this->configuration->isDryRun()) {
            return;
        }
        $this->composerJsonPrinter->print($composerJson, $smartFileInfo);
    }
}
