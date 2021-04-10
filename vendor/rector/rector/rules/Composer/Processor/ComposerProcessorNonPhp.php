<?php

declare (strict_types=1);
namespace Rector\Composer\Processor;

use Rector\Composer\Modifier\ComposerModifier;
use Rector\Core\Configuration\Configuration;
use Rector\Core\Contract\Processor\NonPhpFileProcessorInterface;
use Rector\Core\ValueObject\NonPhpFile\NonPhpFileChange;
use Typo3RectorPrefix20210410\Symfony\Component\Process\Process;
use Typo3RectorPrefix20210410\Symplify\ComposerJsonManipulator\ComposerJsonFactory;
use Typo3RectorPrefix20210410\Symplify\ComposerJsonManipulator\Printer\ComposerJsonPrinter;
use Typo3RectorPrefix20210410\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson;
use Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo;
final class ComposerProcessorNonPhp implements \Rector\Core\Contract\Processor\NonPhpFileProcessorInterface
{
    /**
     * @var string
     */
    private const COMPOSER_UPDATE = 'composer update';
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
    /**
     * @var Configuration
     */
    private $configuration;
    public function __construct(\Typo3RectorPrefix20210410\Symplify\ComposerJsonManipulator\ComposerJsonFactory $composerJsonFactory, \Typo3RectorPrefix20210410\Symplify\ComposerJsonManipulator\Printer\ComposerJsonPrinter $composerJsonPrinter, \Rector\Core\Configuration\Configuration $configuration, \Rector\Composer\Modifier\ComposerModifier $composerModifier)
    {
        $this->composerJsonFactory = $composerJsonFactory;
        $this->composerJsonPrinter = $composerJsonPrinter;
        $this->configuration = $configuration;
        $this->composerModifier = $composerModifier;
    }
    public function process(\Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : ?\Rector\Core\ValueObject\NonPhpFile\NonPhpFileChange
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
        $this->reportFileContentChange($composerJson, $smartFileInfo);
        return new \Rector\Core\ValueObject\NonPhpFile\NonPhpFileChange($oldContent, $newContent);
    }
    public function supports(\Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : bool
    {
        return $smartFileInfo->getRealPath() === \getcwd() . '/composer.json';
    }
    /**
     * @return string[]
     */
    public function getSupportedFileExtensions() : array
    {
        return ['json'];
    }
    private function reportFileContentChange(\Typo3RectorPrefix20210410\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $composerJson, \Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : void
    {
        if ($this->configuration->isDryRun()) {
            return;
        }
        $this->composerJsonPrinter->print($composerJson, $smartFileInfo);
        $process = new \Typo3RectorPrefix20210410\Symfony\Component\Process\Process(\explode(' ', self::COMPOSER_UPDATE), \getcwd());
        $process->run(function (string $type, string $message) : void {
            // $type is always err https://github.com/composer/composer/issues/3795#issuecomment-76401013
            echo $message;
        });
    }
}
