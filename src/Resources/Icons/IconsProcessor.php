<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Resources\Icons;

use Rector\Core\Configuration\Configuration;
use Ssch\TYPO3Rector\Processor\ProcessorInterface;
use Typo3RectorPrefix20210408\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210408\Symplify\SmartFileSystem\SmartFileInfo;
use Typo3RectorPrefix20210408\Symplify\SmartFileSystem\SmartFileSystem;
final class IconsProcessor implements \Ssch\TYPO3Rector\Processor\ProcessorInterface
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
    public function __construct(\Typo3RectorPrefix20210408\Symplify\SmartFileSystem\SmartFileSystem $smartFileSystem, \Typo3RectorPrefix20210408\Symfony\Component\Console\Style\SymfonyStyle $symfonyStyle, \Rector\Core\Configuration\Configuration $configuration)
    {
        $this->smartFileSystem = $smartFileSystem;
        $this->symfonyStyle = $symfonyStyle;
        $this->configuration = $configuration;
    }
    public function process(\Typo3RectorPrefix20210408\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : ?string
    {
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
        return null;
    }
    public function canProcess(\Typo3RectorPrefix20210408\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : bool
    {
        if (!\in_array($smartFileInfo->getFilename(), ['ext_icon.png', 'ext_icon.svg', 'ext_icon.gif'], \true)) {
            return \false;
        }
        $extEmConf = \sprintf('%s/ext_emconf.php', \rtrim(\dirname($smartFileInfo->getRealPath()), '/'));
        return $this->smartFileSystem->exists($extEmConf);
    }
    public function allowedFileExtensions() : array
    {
        return ['png', 'gif', 'svg'];
    }
}