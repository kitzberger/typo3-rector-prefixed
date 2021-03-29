<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210329\Symplify\SymplifyKernel\Console;

use Typo3RectorPrefix20210329\Symfony\Component\Console\Command\Command;
use Typo3RectorPrefix20210329\Symplify\ComposerJsonManipulator\ComposerJsonFactory;
use Typo3RectorPrefix20210329\Symplify\PackageBuilder\Composer\PackageVersionProvider;
use Typo3RectorPrefix20210329\Symplify\PackageBuilder\Parameter\ParameterProvider;
use Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileSystem;
use Typo3RectorPrefix20210329\Symplify\SymplifyKernel\Strings\StringsConverter;
final class ConsoleApplicationFactory
{
    /**
     * @var Command[]
     */
    private $commands = [];
    /**
     * @var StringsConverter
     */
    private $stringsConverter;
    /**
     * @var ParameterProvider
     */
    private $parameterProvider;
    /**
     * @var ComposerJsonFactory
     */
    private $composerJsonFactory;
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    /**
     * @param Command[] $commands
     */
    public function __construct(array $commands, \Typo3RectorPrefix20210329\Symplify\PackageBuilder\Parameter\ParameterProvider $parameterProvider, \Typo3RectorPrefix20210329\Symplify\ComposerJsonManipulator\ComposerJsonFactory $composerJsonFactory, \Typo3RectorPrefix20210329\Symplify\SmartFileSystem\SmartFileSystem $smartFileSystem)
    {
        $this->commands = $commands;
        $this->stringsConverter = new \Typo3RectorPrefix20210329\Symplify\SymplifyKernel\Strings\StringsConverter();
        $this->parameterProvider = $parameterProvider;
        $this->composerJsonFactory = $composerJsonFactory;
        $this->smartFileSystem = $smartFileSystem;
    }
    public function create() : \Typo3RectorPrefix20210329\Symplify\SymplifyKernel\Console\AutowiredConsoleApplication
    {
        $autowiredConsoleApplication = new \Typo3RectorPrefix20210329\Symplify\SymplifyKernel\Console\AutowiredConsoleApplication($this->commands);
        $this->decorateApplicationWithNameAndVersion($autowiredConsoleApplication);
        return $autowiredConsoleApplication;
    }
    private function decorateApplicationWithNameAndVersion(\Typo3RectorPrefix20210329\Symplify\SymplifyKernel\Console\AutowiredConsoleApplication $autowiredConsoleApplication) : void
    {
        $projectDir = $this->parameterProvider->provideStringParameter('kernel.project_dir');
        $packageComposerJsonFilePath = $projectDir . \DIRECTORY_SEPARATOR . 'composer.json';
        if (!$this->smartFileSystem->exists($packageComposerJsonFilePath)) {
            return;
        }
        // name
        $composerJson = $this->composerJsonFactory->createFromFilePath($packageComposerJsonFilePath);
        $shortName = $composerJson->getShortName();
        if ($shortName === null) {
            return;
        }
        $projectName = $this->stringsConverter->dashedToCamelCaseWithGlue($shortName, ' ');
        $autowiredConsoleApplication->setName($projectName);
        // version
        $packageName = $composerJson->getName();
        if ($packageName === null) {
            return;
        }
        $packageVersionProvider = new \Typo3RectorPrefix20210329\Symplify\PackageBuilder\Composer\PackageVersionProvider();
        $version = $packageVersionProvider->provide($packageName);
        $autowiredConsoleApplication->setVersion($version);
    }
}
