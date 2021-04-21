<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Composer;

use Rector\Core\Contract\Processor\FileProcessorInterface;
use Rector\Core\ValueObject\Application\File;
use Typo3RectorPrefix20210421\Symplify\ComposerJsonManipulator\ComposerJsonFactory;
use Typo3RectorPrefix20210421\Symplify\ComposerJsonManipulator\Printer\ComposerJsonPrinter;
final class ExtensionComposerProcessor implements \Rector\Core\Contract\Processor\FileProcessorInterface
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
     * @var ComposerModifier
     */
    private $composerModifier;
    public function __construct(\Typo3RectorPrefix20210421\Symplify\ComposerJsonManipulator\ComposerJsonFactory $composerJsonFactory, \Typo3RectorPrefix20210421\Symplify\ComposerJsonManipulator\Printer\ComposerJsonPrinter $composerJsonPrinter, \Ssch\TYPO3Rector\Composer\ComposerModifier $composerModifier)
    {
        $this->composerJsonFactory = $composerJsonFactory;
        $this->composerJsonPrinter = $composerJsonPrinter;
        $this->composerModifier = $composerModifier;
    }
    /**
     * @param File[] $files
     */
    public function process(array $files) : void
    {
        // to avoid modification of file
        if (!$this->composerModifier->enabled()) {
            return;
        }
        foreach ($files as $file) {
            $this->processFile($file);
        }
    }
    public function supports(\Rector\Core\ValueObject\Application\File $file) : bool
    {
        $smartFileInfo = $file->getSmartFileInfo();
        if ('composer.json' !== $smartFileInfo->getBasename()) {
            return \false;
        }
        return \in_array($smartFileInfo->getExtension(), $this->getSupportedFileExtensions(), \true);
    }
    /**
     * @return string[]
     */
    public function getSupportedFileExtensions() : array
    {
        return ['json'];
    }
    private function processFile(\Rector\Core\ValueObject\Application\File $file) : void
    {
        $smartFileInfo = $file->getSmartFileInfo();
        $composerJson = $this->composerJsonFactory->createFromFileInfo($smartFileInfo);
        $oldComposerJson = clone $composerJson;
        $this->composerModifier->modify($composerJson);
        // nothing has changed
        if ($oldComposerJson->getJsonArray() === $composerJson->getJsonArray()) {
            return;
        }
        $newContent = $this->composerJsonPrinter->printToString($composerJson);
        $file->changeFileContent($newContent);
    }
}
