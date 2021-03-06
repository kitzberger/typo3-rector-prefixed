<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Resources\Icons;

use Rector\Core\Configuration\Configuration;
use Rector\Core\Contract\Processor\FileProcessorInterface;
use Rector\Core\Contract\Rector\RectorInterface;
use Rector\Core\ValueObject\Application\File;
use Typo3RectorPrefix20210423\Symfony\Component\Console\Style\SymfonyStyle;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileSystem;
final class IconsProcessor implements \Rector\Core\Contract\Processor\FileProcessorInterface, \Rector\Core\Contract\Rector\RectorInterface
{
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    /**
     * @var SymfonyStyle
     */
    private $symfonyStyle;
    /**
     * @var Configuration
     */
    private $configuration;
    public function __construct(\Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileSystem $smartFileSystem, \Typo3RectorPrefix20210423\Symfony\Component\Console\Style\SymfonyStyle $symfonyStyle, \Rector\Core\Configuration\Configuration $configuration)
    {
        $this->smartFileSystem = $smartFileSystem;
        $this->symfonyStyle = $symfonyStyle;
        $this->configuration = $configuration;
    }
    /**
     * @param File[] $files
     */
    public function process(array $files) : void
    {
        foreach ($files as $file) {
            $this->processFile($file);
        }
    }
    public function supports(\Rector\Core\ValueObject\Application\File $file) : bool
    {
        $smartFileInfo = $file->getSmartFileInfo();
        if (!\in_array($smartFileInfo->getFilename(), ['ext_icon.png', 'ext_icon.svg', 'ext_icon.gif'], \true)) {
            return \false;
        }
        $extEmConf = \sprintf('%s/ext_emconf.php', \rtrim(\dirname($smartFileInfo->getRealPath()), '/'));
        return $this->smartFileSystem->exists($extEmConf);
    }
    public function getSupportedFileExtensions() : array
    {
        return ['png', 'gif', 'svg'];
    }
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Move ext_icon.* to Resources/Icons/Extension.*', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
ext_icon.gif
CODE_SAMPLE
, <<<'CODE_SAMPLE'
Resources/Icons/Extension.gif
CODE_SAMPLE
)]);
    }
    private function processFile(\Rector\Core\ValueObject\Application\File $file) : void
    {
        $smartFileInfo = $file->getSmartFileInfo();
        $relativeFilePath = \dirname($smartFileInfo->getRelativeFilePath());
        $realPath = \dirname($smartFileInfo->getRealPath());
        $relativeTargetFilePath = \sprintf('/Resources/Public/Icons/Extension.%s', $smartFileInfo->getExtension());
        $newFullPath = $realPath . $relativeTargetFilePath;
        if ($this->configuration->isDryRun()) {
            $message = \sprintf('File "%s" will be moved to %s', $relativeFilePath, $relativeFilePath . $relativeTargetFilePath);
            $this->symfonyStyle->info($message);
        } elseif (!$this->smartFileSystem->exists($newFullPath)) {
            $message = \sprintf('File "%s" moved to %s', $relativeFilePath, $relativeFilePath . $relativeTargetFilePath);
            $this->symfonyStyle->info($message);
            if (!$this->smartFileSystem->exists(\dirname($newFullPath))) {
                $this->smartFileSystem->mkdir(\dirname($newFullPath));
            }
            $this->smartFileSystem->rename($smartFileInfo->getRealPath(), $newFullPath, \true);
        } else {
            $message = \sprintf('File "%s" already exists.', $newFullPath);
            $this->symfonyStyle->warning($message);
        }
    }
}
