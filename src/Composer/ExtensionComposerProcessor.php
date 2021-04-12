<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Composer;

use Rector\Core\Contract\Processor\FileProcessorInterface;
use Rector\Core\ValueObject\NonPhpFile\NonPhpFileChange;
use Typo3RectorPrefix20210412\Symplify\ComposerJsonManipulator\ComposerJsonFactory;
use Typo3RectorPrefix20210412\Symplify\ComposerJsonManipulator\Printer\ComposerJsonPrinter;
use Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo;
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
    public function __construct(\Typo3RectorPrefix20210412\Symplify\ComposerJsonManipulator\ComposerJsonFactory $composerJsonFactory, \Typo3RectorPrefix20210412\Symplify\ComposerJsonManipulator\Printer\ComposerJsonPrinter $composerJsonPrinter, \Ssch\TYPO3Rector\Composer\ComposerModifier $composerModifier)
    {
        $this->composerJsonFactory = $composerJsonFactory;
        $this->composerJsonPrinter = $composerJsonPrinter;
        $this->composerModifier = $composerModifier;
    }
    public function process(\Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : ?\Rector\Core\ValueObject\NonPhpFile\NonPhpFileChange
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
        $oldContent = $this->composerJsonPrinter->printToString($oldComposerJson);
        $newContent = $this->composerJsonPrinter->printToString($composerJson);
        return new \Rector\Core\ValueObject\NonPhpFile\NonPhpFileChange($oldContent, $newContent);
    }
    public function supports(\Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : bool
    {
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
}
