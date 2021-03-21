<?php

declare (strict_types=1);
namespace Rector\Core\Console\Command;

use Typo3RectorPrefix20210321\Nette\Utils\Strings;
use Rector\Caching\Application\CachedFileInfoFilterAndReporter;
use Rector\Caching\Detector\ChangedFilesDetector;
use Rector\ChangesReporting\Application\ErrorAndDiffCollector;
use Rector\ChangesReporting\Output\ConsoleOutputFormatter;
use Rector\Composer\Processor\ComposerProcessor;
use Rector\Core\Application\RectorApplication;
use Rector\Core\Autoloading\AdditionalAutoloader;
use Rector\Core\Configuration\Configuration;
use Rector\Core\Configuration\Option;
use Rector\Core\Console\Output\OutputFormatterCollector;
use Rector\Core\FileSystem\FilesFinder;
use Rector\Core\Guard\RectorGuard;
use Rector\Core\NonPhpFile\NonPhpFileProcessor;
use Rector\Core\PhpParser\NodeTraverser\RectorNodeTraverser;
use Rector\Core\Stubs\StubLoader;
use Rector\Core\ValueObject\StaticNonPhpFileSuffixes;
use Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputArgument;
use Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputInterface;
use Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputOption;
use Typo3RectorPrefix20210321\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210321\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210321\Symplify\PackageBuilder\Console\ShellCode;
use Typo3RectorPrefix20210321\Symplify\SmartFileSystem\SmartFileInfo;
final class ProcessCommand extends \Rector\Core\Console\Command\AbstractCommand
{
    /**
     * @var FilesFinder
     */
    private $filesFinder;
    /**
     * @var AdditionalAutoloader
     */
    private $additionalAutoloader;
    /**
     * @var RectorGuard
     */
    private $rectorGuard;
    /**
     * @var ErrorAndDiffCollector
     */
    private $errorAndDiffCollector;
    /**
     * @var Configuration
     */
    private $configuration;
    /**
     * @var RectorApplication
     */
    private $rectorApplication;
    /**
     * @var OutputFormatterCollector
     */
    private $outputFormatterCollector;
    /**
     * @var RectorNodeTraverser
     */
    private $rectorNodeTraverser;
    /**
     * @var StubLoader
     */
    private $stubLoader;
    /**
     * @var NonPhpFileProcessor
     */
    private $nonPhpFileProcessor;
    /**
     * @var SymfonyStyle
     */
    private $symfonyStyle;
    /**
     * @var CachedFileInfoFilterAndReporter
     */
    private $cachedFileInfoFilterAndReporter;
    /**
     * @var ComposerProcessor
     */
    private $composerProcessor;
    public function __construct(\Rector\Core\Autoloading\AdditionalAutoloader $additionalAutoloader, \Rector\Caching\Detector\ChangedFilesDetector $changedFilesDetector, \Rector\Core\Configuration\Configuration $configuration, \Rector\ChangesReporting\Application\ErrorAndDiffCollector $errorAndDiffCollector, \Rector\Core\FileSystem\FilesFinder $phpFilesFinder, \Rector\Core\NonPhpFile\NonPhpFileProcessor $nonPhpFileProcessor, \Rector\Core\Console\Output\OutputFormatterCollector $outputFormatterCollector, \Rector\Core\Application\RectorApplication $rectorApplication, \Rector\Core\Guard\RectorGuard $rectorGuard, \Rector\Core\PhpParser\NodeTraverser\RectorNodeTraverser $rectorNodeTraverser, \Rector\Core\Stubs\StubLoader $stubLoader, \Typo3RectorPrefix20210321\Symfony\Component\Console\Style\SymfonyStyle $symfonyStyle, \Rector\Caching\Application\CachedFileInfoFilterAndReporter $cachedFileInfoFilterAndReporter, \Rector\Composer\Processor\ComposerProcessor $composerProcessor)
    {
        $this->filesFinder = $phpFilesFinder;
        $this->additionalAutoloader = $additionalAutoloader;
        $this->rectorGuard = $rectorGuard;
        $this->errorAndDiffCollector = $errorAndDiffCollector;
        $this->configuration = $configuration;
        $this->rectorApplication = $rectorApplication;
        $this->outputFormatterCollector = $outputFormatterCollector;
        $this->rectorNodeTraverser = $rectorNodeTraverser;
        $this->stubLoader = $stubLoader;
        $this->nonPhpFileProcessor = $nonPhpFileProcessor;
        $this->changedFilesDetector = $changedFilesDetector;
        $this->symfonyStyle = $symfonyStyle;
        $this->cachedFileInfoFilterAndReporter = $cachedFileInfoFilterAndReporter;
        $this->composerProcessor = $composerProcessor;
        parent::__construct();
    }
    protected function configure() : void
    {
        $this->setAliases(['rectify']);
        $this->setDescription('Upgrade or refactor source code with provided rectors');
        $this->addArgument(\Rector\Core\Configuration\Option::SOURCE, \Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputArgument::OPTIONAL | \Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputArgument::IS_ARRAY, 'Files or directories to be upgraded.');
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_DRY_RUN, 'n', \Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'See diff of changes, do not save them to files.');
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_AUTOLOAD_FILE, 'a', \Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputOption::VALUE_REQUIRED, 'File with extra autoload');
        $names = $this->outputFormatterCollector->getNames();
        $description = \sprintf('Select output format: "%s".', \implode('", "', $names));
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_OUTPUT_FORMAT, 'o', \Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputOption::VALUE_OPTIONAL, $description, \Rector\ChangesReporting\Output\ConsoleOutputFormatter::NAME);
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_NO_PROGRESS_BAR, null, \Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'Hide progress bar. Useful e.g. for nicer CI output.');
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_NO_DIFFS, null, \Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'Hide diffs of changed files. Useful e.g. for nicer CI output.');
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_OUTPUT_FILE, null, \Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputOption::VALUE_REQUIRED, 'Location for file to dump result in. Useful for Docker or automated processes');
        $this->addOption(\Rector\Core\Configuration\Option::CACHE_DEBUG, null, \Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'Debug changed file cache');
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_CLEAR_CACHE, null, \Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'Clear unchaged files cache');
    }
    protected function execute(\Typo3RectorPrefix20210321\Symfony\Component\Console\Input\InputInterface $input, \Typo3RectorPrefix20210321\Symfony\Component\Console\Output\OutputInterface $output) : int
    {
        $this->configuration->resolveFromInput($input);
        $this->configuration->validateConfigParameters();
        $this->configuration->setAreAnyPhpRectorsLoaded((bool) $this->rectorNodeTraverser->getPhpRectorCount());
        $this->rectorGuard->ensureSomeRectorsAreRegistered();
        $this->stubLoader->loadStubs();
        $paths = $this->configuration->getPaths();
        $phpFileInfos = $this->findPhpFileInfos($paths);
        $this->additionalAutoloader->autoloadWithInputAndSource($input, $paths);
        if ($this->configuration->isCacheDebug()) {
            $message = \sprintf('[cache] %d files after cache filter', \count($phpFileInfos));
            $this->symfonyStyle->note($message);
            $this->symfonyStyle->listing($phpFileInfos);
        }
        $this->configuration->setFileInfos($phpFileInfos);
        $this->rectorApplication->runOnFileInfos($phpFileInfos);
        // must run after PHP rectors, because they might change class names, and these class names must be changed in configs
        $nonPhpFileInfos = $this->filesFinder->findInDirectoriesAndFiles($paths, \Rector\Core\ValueObject\StaticNonPhpFileSuffixes::SUFFIXES);
        $this->nonPhpFileProcessor->runOnFileInfos($nonPhpFileInfos);
        $composerJsonFilePath = \getcwd() . '/composer.json';
        $this->composerProcessor->process($composerJsonFilePath);
        $this->reportZeroCacheRectorsCondition();
        // report diffs and errors
        $outputFormat = (string) $input->getOption(\Rector\Core\Configuration\Option::OPTION_OUTPUT_FORMAT);
        $outputFormatter = $this->outputFormatterCollector->getByName($outputFormat);
        $outputFormatter->report($this->errorAndDiffCollector);
        // invalidate affected files
        $this->invalidateAffectedCacheFiles();
        // some errors were found → fail
        if ($this->errorAndDiffCollector->getErrors() !== []) {
            return \Typo3RectorPrefix20210321\Symplify\PackageBuilder\Console\ShellCode::ERROR;
        }
        // inverse error code for CI dry-run
        if (!$this->configuration->isDryRun()) {
            return \Typo3RectorPrefix20210321\Symplify\PackageBuilder\Console\ShellCode::SUCCESS;
        }
        if ($this->errorAndDiffCollector->getFileDiffsCount() === 0) {
            return \Typo3RectorPrefix20210321\Symplify\PackageBuilder\Console\ShellCode::SUCCESS;
        }
        return \Typo3RectorPrefix20210321\Symplify\PackageBuilder\Console\ShellCode::ERROR;
    }
    /**
     * @param string[] $paths
     * @return SmartFileInfo[]
     */
    private function findPhpFileInfos(array $paths) : array
    {
        $phpFileInfos = $this->filesFinder->findInDirectoriesAndFiles($paths, $this->configuration->getFileExtensions());
        // filter out non-PHP php files, e.g. blade templates in Laravel
        $phpFileInfos = \array_filter($phpFileInfos, function (\Typo3RectorPrefix20210321\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : bool {
            return !\Typo3RectorPrefix20210321\Nette\Utils\Strings::endsWith($smartFileInfo->getPathname(), '.blade.php');
        });
        return $this->cachedFileInfoFilterAndReporter->filterFileInfos($phpFileInfos);
    }
    private function reportZeroCacheRectorsCondition() : void
    {
        if (!$this->configuration->isCacheEnabled()) {
            return;
        }
        if ($this->configuration->shouldClearCache()) {
            return;
        }
        if (!$this->rectorNodeTraverser->hasZeroCacheRectors()) {
            return;
        }
        if ($this->configuration->shouldHideClutter()) {
            return;
        }
        $message = \sprintf('Ruleset contains %d rules that need "--clear-cache" option to analyse full project', $this->rectorNodeTraverser->getZeroCacheRectorCount());
        $this->symfonyStyle->note($message);
    }
    private function invalidateAffectedCacheFiles() : void
    {
        if (!$this->configuration->isCacheEnabled()) {
            return;
        }
        foreach ($this->errorAndDiffCollector->getAffectedFileInfos() as $affectedFileInfo) {
            $this->changedFilesDetector->invalidateFile($affectedFileInfo);
        }
    }
}
