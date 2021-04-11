<?php

declare (strict_types=1);
namespace Rector\Core\Console\Command;

use Rector\Caching\Detector\ChangedFilesDetector;
use Rector\ChangesReporting\Application\ErrorAndDiffCollector;
use Rector\ChangesReporting\Output\ConsoleOutputFormatter;
use Rector\Core\Application\RectorApplication;
use Rector\Core\Autoloading\AdditionalAutoloader;
use Rector\Core\Configuration\Configuration;
use Rector\Core\Configuration\Option;
use Rector\Core\Console\Output\OutputFormatterCollector;
use Rector\Core\Exception\ShouldNotHappenException;
use Rector\Core\FileSystem\PhpFilesFinder;
use Rector\Core\NonPhpFile\NonPhpFileProcessorService;
use Rector\Core\Reporting\MissingRectorRulesReporter;
use Typo3RectorPrefix20210411\Symfony\Component\Console\Application;
use Typo3RectorPrefix20210411\Symfony\Component\Console\Command\Command;
use Typo3RectorPrefix20210411\Symfony\Component\Console\Input\InputArgument;
use Typo3RectorPrefix20210411\Symfony\Component\Console\Input\InputInterface;
use Typo3RectorPrefix20210411\Symfony\Component\Console\Input\InputOption;
use Typo3RectorPrefix20210411\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210411\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210411\Symplify\PackageBuilder\Console\ShellCode;
use Typo3RectorPrefix20210411\Symplify\PackageBuilder\Parameter\ParameterProvider;
use Throwable;
final class ProcessCommand extends \Typo3RectorPrefix20210411\Symfony\Component\Console\Command\Command
{
    /**
     * @var AdditionalAutoloader
     */
    private $additionalAutoloader;
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
     * @var SymfonyStyle
     */
    private $symfonyStyle;
    /**
     * @var PhpFilesFinder
     */
    private $phpFilesFinder;
    /**
     * @var ChangedFilesDetector
     */
    private $changedFilesDetector;
    /**
     * @var MissingRectorRulesReporter
     */
    private $missingRectorRulesReporter;
    /**
     * @var ParameterProvider
     */
    private $parameterProvider;
    /**
     * @var NonPhpFileProcessorService
     */
    private $nonPhpFileProcessorService;
    public function __construct(\Rector\Core\Autoloading\AdditionalAutoloader $additionalAutoloader, \Rector\Caching\Detector\ChangedFilesDetector $changedFilesDetector, \Rector\Core\Configuration\Configuration $configuration, \Rector\ChangesReporting\Application\ErrorAndDiffCollector $errorAndDiffCollector, \Rector\Core\Console\Output\OutputFormatterCollector $outputFormatterCollector, \Rector\Core\Application\RectorApplication $rectorApplication, \Typo3RectorPrefix20210411\Symfony\Component\Console\Style\SymfonyStyle $symfonyStyle, \Rector\Core\FileSystem\PhpFilesFinder $phpFilesFinder, \Rector\Core\Reporting\MissingRectorRulesReporter $missingRectorRulesReporter, \Typo3RectorPrefix20210411\Symplify\PackageBuilder\Parameter\ParameterProvider $parameterProvider, \Rector\Core\NonPhpFile\NonPhpFileProcessorService $nonPhpFileProcessorService)
    {
        $this->additionalAutoloader = $additionalAutoloader;
        $this->errorAndDiffCollector = $errorAndDiffCollector;
        $this->configuration = $configuration;
        $this->rectorApplication = $rectorApplication;
        $this->outputFormatterCollector = $outputFormatterCollector;
        $this->changedFilesDetector = $changedFilesDetector;
        $this->symfonyStyle = $symfonyStyle;
        $this->phpFilesFinder = $phpFilesFinder;
        $this->missingRectorRulesReporter = $missingRectorRulesReporter;
        parent::__construct();
        $this->parameterProvider = $parameterProvider;
        $this->nonPhpFileProcessorService = $nonPhpFileProcessorService;
    }
    protected function configure() : void
    {
        $this->setDescription('Upgrade or refactor source code with provided rectors');
        $this->addArgument(\Rector\Core\Configuration\Option::SOURCE, \Typo3RectorPrefix20210411\Symfony\Component\Console\Input\InputArgument::OPTIONAL | \Typo3RectorPrefix20210411\Symfony\Component\Console\Input\InputArgument::IS_ARRAY, 'Files or directories to be upgraded.');
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_DRY_RUN, 'n', \Typo3RectorPrefix20210411\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'See diff of changes, do not save them to files.');
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_AUTOLOAD_FILE, 'a', \Typo3RectorPrefix20210411\Symfony\Component\Console\Input\InputOption::VALUE_REQUIRED, 'File with extra autoload');
        $names = $this->outputFormatterCollector->getNames();
        $description = \sprintf('Select output format: "%s".', \implode('", "', $names));
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_OUTPUT_FORMAT, 'o', \Typo3RectorPrefix20210411\Symfony\Component\Console\Input\InputOption::VALUE_OPTIONAL, $description, \Rector\ChangesReporting\Output\ConsoleOutputFormatter::NAME);
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_NO_PROGRESS_BAR, null, \Typo3RectorPrefix20210411\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'Hide progress bar. Useful e.g. for nicer CI output.');
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_NO_DIFFS, null, \Typo3RectorPrefix20210411\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'Hide diffs of changed files. Useful e.g. for nicer CI output.');
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_OUTPUT_FILE, null, \Typo3RectorPrefix20210411\Symfony\Component\Console\Input\InputOption::VALUE_REQUIRED, 'Location for file to dump result in. Useful for Docker or automated processes');
        $this->addOption(\Rector\Core\Configuration\Option::CACHE_DEBUG, null, \Typo3RectorPrefix20210411\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'Debug changed file cache');
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_CLEAR_CACHE, null, \Typo3RectorPrefix20210411\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'Clear unchaged files cache');
    }
    protected function execute(\Typo3RectorPrefix20210411\Symfony\Component\Console\Input\InputInterface $input, \Typo3RectorPrefix20210411\Symfony\Component\Console\Output\OutputInterface $output) : int
    {
        $exitCode = $this->missingRectorRulesReporter->reportIfMissing();
        if ($exitCode !== null) {
            return $exitCode;
        }
        $this->configuration->resolveFromInput($input);
        $this->configuration->validateConfigParameters();
        $paths = $this->configuration->getPaths();
        $phpFileInfos = $this->phpFilesFinder->findInPaths($paths);
        // register autoloaded and included files
        $this->includeBootstrapFiles();
        $this->additionalAutoloader->autoloadWithInputAndSource($input);
        if ($this->configuration->isCacheDebug()) {
            $message = \sprintf('[cache] %d files after cache filter', \count($phpFileInfos));
            $this->symfonyStyle->note($message);
            $this->symfonyStyle->listing($phpFileInfos);
        }
        $this->configuration->setFileInfos($phpFileInfos);
        $this->rectorApplication->runOnPaths($paths);
        $this->nonPhpFileProcessorService->runOnPaths($paths);
        // report diffs and errors
        $outputFormat = (string) $input->getOption(\Rector\Core\Configuration\Option::OPTION_OUTPUT_FORMAT);
        $outputFormatter = $this->outputFormatterCollector->getByName($outputFormat);
        $outputFormatter->report($this->errorAndDiffCollector);
        // invalidate affected files
        $this->invalidateAffectedCacheFiles();
        // some errors were found → fail
        if ($this->errorAndDiffCollector->getErrors() !== []) {
            return \Typo3RectorPrefix20210411\Symplify\PackageBuilder\Console\ShellCode::ERROR;
        }
        // inverse error code for CI dry-run
        if (!$this->configuration->isDryRun()) {
            return \Typo3RectorPrefix20210411\Symplify\PackageBuilder\Console\ShellCode::SUCCESS;
        }
        if ($this->errorAndDiffCollector->getFileDiffsCount() === 0) {
            return \Typo3RectorPrefix20210411\Symplify\PackageBuilder\Console\ShellCode::SUCCESS;
        }
        return \Typo3RectorPrefix20210411\Symplify\PackageBuilder\Console\ShellCode::ERROR;
    }
    protected function initialize(\Typo3RectorPrefix20210411\Symfony\Component\Console\Input\InputInterface $input, \Typo3RectorPrefix20210411\Symfony\Component\Console\Output\OutputInterface $output) : void
    {
        $application = $this->getApplication();
        if (!$application instanceof \Typo3RectorPrefix20210411\Symfony\Component\Console\Application) {
            throw new \Rector\Core\Exception\ShouldNotHappenException();
        }
        $optionDebug = (bool) $input->getOption(\Rector\Core\Configuration\Option::OPTION_DEBUG);
        if ($optionDebug) {
            $application->setCatchExceptions(\false);
            // clear cache
            $this->changedFilesDetector->clear();
            return;
        }
        // clear cache
        $optionClearCache = (bool) $input->getOption(\Rector\Core\Configuration\Option::OPTION_CLEAR_CACHE);
        if ($optionClearCache) {
            $this->changedFilesDetector->clear();
        }
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
    /**
     * Inspired by
     * @see https://github.com/phpstan/phpstan-src/commit/aad1bf888ab7b5808898ee5fe2228bb8bb4e4cf1
     */
    private function includeBootstrapFiles() : void
    {
        $bootstrapFiles = $this->parameterProvider->provideArrayParameter(\Rector\Core\Configuration\Option::BOOTSTRAP_FILES);
        foreach ($bootstrapFiles as $bootstrapFile) {
            if (!\is_file($bootstrapFile)) {
                throw new \Rector\Core\Exception\ShouldNotHappenException('Bootstrap file %s does not exist.', $bootstrapFile);
            }
            try {
                require_once $bootstrapFile;
            } catch (\Throwable $throwable) {
                $errorMessage = \sprintf('"%s" thrown in "%s" on line %d while loading bootstrap file %s: %s', \get_class($throwable), $throwable->getFile(), $throwable->getLine(), $bootstrapFile, $throwable->getMessage());
                throw new \Rector\Core\Exception\ShouldNotHappenException($errorMessage);
            }
        }
    }
}
