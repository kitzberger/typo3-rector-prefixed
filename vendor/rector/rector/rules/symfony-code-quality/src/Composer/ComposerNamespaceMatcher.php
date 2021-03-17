<?php

declare (strict_types=1);
namespace Rector\SymfonyCodeQuality\Composer;

use Typo3RectorPrefix20210317\Nette\Utils\Strings;
use Typo3RectorPrefix20210317\Symplify\ComposerJsonManipulator\ComposerJsonFactory;
use Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileSystem;
final class ComposerNamespaceMatcher
{
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    /**
     * @var ComposerJsonFactory
     */
    private $composerJsonFactory;
    public function __construct(\Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileSystem $smartFileSystem, \Typo3RectorPrefix20210317\Symplify\ComposerJsonManipulator\ComposerJsonFactory $composerJsonFactory)
    {
        $this->smartFileSystem = $smartFileSystem;
        $this->composerJsonFactory = $composerJsonFactory;
    }
    public function matchNamespaceForLocation(string $path) : ?string
    {
        $composerJsonFilePath = \getcwd() . '/composer.json';
        if (!$this->smartFileSystem->exists($composerJsonFilePath)) {
            return null;
        }
        $composerJson = $this->composerJsonFactory->createFromFilePath($composerJsonFilePath);
        $autoload = $composerJson->getAutoload();
        foreach ($autoload['psr-4'] ?? [] as $namespace => $directory) {
            if (!\Typo3RectorPrefix20210317\Nette\Utils\Strings::startsWith($path, $directory)) {
                continue;
            }
            return \rtrim($namespace, '\\');
        }
        return null;
    }
}
