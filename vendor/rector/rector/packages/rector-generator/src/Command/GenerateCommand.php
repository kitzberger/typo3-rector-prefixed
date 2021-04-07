<?php

declare (strict_types=1);
namespace Rector\RectorGenerator\Command;

use Typo3RectorPrefix20210407\Nette\Utils\Strings;
use Rector\Core\Exception\ShouldNotHappenException;
use Rector\RectorGenerator\Composer\ComposerPackageAutoloadUpdater;
use Rector\RectorGenerator\Config\ConfigFilesystem;
use Rector\RectorGenerator\Finder\TemplateFinder;
use Rector\RectorGenerator\Generator\FileGenerator;
use Rector\RectorGenerator\Guard\OverrideGuard;
use Rector\RectorGenerator\Provider\RectorRecipeProvider;
use Rector\RectorGenerator\TemplateVariablesFactory;
use Rector\RectorGenerator\ValueObject\RectorRecipe;
use Rector\RectorGenerator\ValueObjectFactory\RectorRecipeInteractiveFactory;
use Rector\Testing\PHPUnit\StaticPHPUnitEnvironment;
use Typo3RectorPrefix20210407\Symfony\Component\Console\Command\Command;
use Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputInterface;
use Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputOption;
use Typo3RectorPrefix20210407\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210407\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210407\Symplify\PackageBuilder\Console\ShellCode;
use Typo3RectorPrefix20210407\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * @see \Rector\RectorGenerator\Tests\RectorGenerator\GenerateCommandInteractiveModeTest
 */
final class GenerateCommand extends \Typo3RectorPrefix20210407\Symfony\Component\Console\Command\Command
{
    /**
     * @var string
     */
    public const INTERACTIVE_MODE_NAME = 'interactive';
    /**
     * @var SymfonyStyle
     */
    private $symfonyStyle;
    /**
     * @var TemplateVariablesFactory
     */
    private $templateVariablesFactory;
    /**
     * @var ComposerPackageAutoloadUpdater
     */
    private $composerPackageAutoloadUpdater;
    /**
     * @var TemplateFinder
     */
    private $templateFinder;
    /**
     * @var ConfigFilesystem
     */
    private $configFilesystem;
    /**
     * @var OverrideGuard
     */
    private $overrideGuard;
    /**
     * @var FileGenerator
     */
    private $fileGenerator;
    /**
     * @var RectorRecipeProvider
     */
    private $rectorRecipeProvider;
    /**
     * @var RectorRecipeInteractiveFactory
     */
    private $rectorRecipeInteractiveFactory;
    public function __construct(\Rector\RectorGenerator\Composer\ComposerPackageAutoloadUpdater $composerPackageAutoloadUpdater, \Rector\RectorGenerator\Config\ConfigFilesystem $configFilesystem, \Rector\RectorGenerator\Generator\FileGenerator $fileGenerator, \Rector\RectorGenerator\Guard\OverrideGuard $overrideGuard, \Typo3RectorPrefix20210407\Symfony\Component\Console\Style\SymfonyStyle $symfonyStyle, \Rector\RectorGenerator\Finder\TemplateFinder $templateFinder, \Rector\RectorGenerator\TemplateVariablesFactory $templateVariablesFactory, \Rector\RectorGenerator\Provider\RectorRecipeProvider $rectorRecipeProvider, \Rector\RectorGenerator\ValueObjectFactory\RectorRecipeInteractiveFactory $rectorRecipeInteractiveFactory)
    {
        parent::__construct();
        $this->templateVariablesFactory = $templateVariablesFactory;
        $this->composerPackageAutoloadUpdater = $composerPackageAutoloadUpdater;
        $this->templateFinder = $templateFinder;
        $this->configFilesystem = $configFilesystem;
        $this->overrideGuard = $overrideGuard;
        $this->symfonyStyle = $symfonyStyle;
        $this->fileGenerator = $fileGenerator;
        $this->rectorRecipeProvider = $rectorRecipeProvider;
        $this->rectorRecipeInteractiveFactory = $rectorRecipeInteractiveFactory;
    }
    protected function configure() : void
    {
        $this->setAliases(['c', 'create', 'g']);
        $this->setDescription('[DEV] Create a new Rector, in a proper location, with new tests');
        $this->addOption(self::INTERACTIVE_MODE_NAME, 'i', \Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'Turns on Interactive Mode - Rector will be generated based on responses to questions instead of using rector-recipe.php');
    }
    protected function execute(\Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputInterface $input, \Typo3RectorPrefix20210407\Symfony\Component\Console\Output\OutputInterface $output) : int
    {
        $rectorRecipe = $this->getRectorRecipe($input);
        $templateVariables = $this->templateVariablesFactory->createFromRectorRecipe($rectorRecipe);
        // setup psr-4 autoload, if not already in
        $this->composerPackageAutoloadUpdater->processComposerAutoload($rectorRecipe);
        $templateFileInfos = $this->templateFinder->find($rectorRecipe);
        $targetDirectory = \getcwd();
        $isUnwantedOverride = $this->overrideGuard->isUnwantedOverride($templateFileInfos, $templateVariables, $rectorRecipe, $targetDirectory);
        if ($isUnwantedOverride) {
            $this->symfonyStyle->warning('No files were changed');
            return \Typo3RectorPrefix20210407\Symplify\PackageBuilder\Console\ShellCode::SUCCESS;
        }
        $generatedFilePaths = $this->fileGenerator->generateFiles($templateFileInfos, $templateVariables, $rectorRecipe, $targetDirectory);
        $this->configFilesystem->appendRectorServiceToSet($rectorRecipe, $templateVariables);
        $testCaseDirectoryPath = $this->resolveTestCaseDirectoryPath($generatedFilePaths);
        $this->printSuccess($rectorRecipe->getName(), $generatedFilePaths, $testCaseDirectoryPath);
        return \Typo3RectorPrefix20210407\Symplify\PackageBuilder\Console\ShellCode::SUCCESS;
    }
    private function getRectorRecipe(\Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputInterface $input) : \Rector\RectorGenerator\ValueObject\RectorRecipe
    {
        $isInteractive = $input->getOption(self::INTERACTIVE_MODE_NAME);
        if (!$isInteractive) {
            return $this->rectorRecipeProvider->provide();
        }
        return $this->rectorRecipeInteractiveFactory->create();
    }
    /**
     * @param string[] $generatedFilePaths
     */
    private function resolveTestCaseDirectoryPath(array $generatedFilePaths) : string
    {
        foreach ($generatedFilePaths as $generatedFilePath) {
            if (!$this->isGeneratedFilePathTestCase($generatedFilePath)) {
                continue;
            }
            $generatedFileInfo = new \Typo3RectorPrefix20210407\Symplify\SmartFileSystem\SmartFileInfo($generatedFilePath);
            return \dirname($generatedFileInfo->getRelativeFilePathFromCwd());
        }
        throw new \Rector\Core\Exception\ShouldNotHappenException();
    }
    /**
     * @param string[] $generatedFilePaths
     */
    private function printSuccess(string $name, array $generatedFilePaths, string $testCaseFilePath) : void
    {
        $message = \sprintf('New files generated for "%s":', $name);
        $this->symfonyStyle->title($message);
        \sort($generatedFilePaths);
        foreach ($generatedFilePaths as $generatedFilePath) {
            $fileInfo = new \Typo3RectorPrefix20210407\Symplify\SmartFileSystem\SmartFileInfo($generatedFilePath);
            $relativeFilePath = $fileInfo->getRelativeFilePathFromCwd();
            $this->symfonyStyle->writeln(' * ' . $relativeFilePath);
        }
        $message = \sprintf('Make tests green again:%svendor/bin/phpunit %s', \PHP_EOL . \PHP_EOL, $testCaseFilePath);
        $this->symfonyStyle->success($message);
    }
    private function isGeneratedFilePathTestCase(string $generatedFilePath) : bool
    {
        if (\Typo3RectorPrefix20210407\Nette\Utils\Strings::endsWith($generatedFilePath, 'Test.php')) {
            return \true;
        }
        if (!\Typo3RectorPrefix20210407\Nette\Utils\Strings::endsWith($generatedFilePath, 'Test.php.inc')) {
            return \false;
        }
        return \Rector\Testing\PHPUnit\StaticPHPUnitEnvironment::isPHPUnitRun();
    }
}
