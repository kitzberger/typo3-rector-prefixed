<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Console\Command;

use Rector\Caching\Detector\ChangedFilesDetector;
use Rector\ChangesReporting\Application\ErrorAndDiffCollector;
use Rector\ChangesReporting\Output\ConsoleOutputFormatter;
use Rector\Core\Autoloading\AdditionalAutoloader;
use Rector\Core\Configuration\Configuration;
use Rector\Core\Configuration\Option;
use Rector\Core\Console\Command\AbstractCommand;
use Rector\Core\Console\Output\OutputFormatterCollector;
use Rector\Core\FileSystem\FilesFinder;
use Ssch\TYPO3Rector\Processor\ProcessorInterface;
use Typo3RectorPrefix20210331\Symfony\Component\Console\Input\InputArgument;
use Typo3RectorPrefix20210331\Symfony\Component\Console\Input\InputInterface;
use Typo3RectorPrefix20210331\Symfony\Component\Console\Input\InputOption;
use Typo3RectorPrefix20210331\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210331\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210331\Symplify\PackageBuilder\Console\ShellCode;
use Typo3RectorPrefix20210331\Symplify\SmartFileSystem\SmartFileSystem;
final class Typo3ProcessCommand extends \Rector\Core\Console\Command\AbstractCommand
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
     * @var ErrorAndDiffCollector
     */
    private $errorAndDiffCollector;
    /**
     * @var Configuration
     */
    private $configuration;
    /**
     * @var OutputFormatterCollector
     */
    private $outputFormatterCollector;
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    /**
     * @var ProcessorInterface[]
     */
    private $processors = [];
    /**
     * @var SymfonyStyle
     */
    private $symfonyStyle;
    /**
     * @param ProcessorInterface[] $processors
     */
    public function __construct(\Rector\Core\Autoloading\AdditionalAutoloader $additionalAutoloader, \Rector\Caching\Detector\ChangedFilesDetector $changedFilesDetector, \Rector\Core\Configuration\Configuration $configuration, \Rector\ChangesReporting\Application\ErrorAndDiffCollector $errorAndDiffCollector, \Rector\Core\FileSystem\FilesFinder $phpFilesFinder, \Rector\Core\Console\Output\OutputFormatterCollector $outputFormatterCollector, array $processors, \Typo3RectorPrefix20210331\Symplify\SmartFileSystem\SmartFileSystem $smartFileSystem, \Typo3RectorPrefix20210331\Symfony\Component\Console\Style\SymfonyStyle $symfonyStyle)
    {
        $this->filesFinder = $phpFilesFinder;
        $this->additionalAutoloader = $additionalAutoloader;
        $this->errorAndDiffCollector = $errorAndDiffCollector;
        $this->configuration = $configuration;
        $this->outputFormatterCollector = $outputFormatterCollector;
        $this->changedFilesDetector = $changedFilesDetector;
        $this->smartFileSystem = $smartFileSystem;
        $this->processors = $processors;
        $this->symfonyStyle = $symfonyStyle;
        parent::__construct();
    }
    protected function configure() : void
    {
        $this->setAliases(['typoscript', 'composer']);
        $this->setDescription('Upgrade non php files in your TYPO3 installation');
        $this->addArgument(\Rector\Core\Configuration\Option::SOURCE, \Typo3RectorPrefix20210331\Symfony\Component\Console\Input\InputArgument::OPTIONAL | \Typo3RectorPrefix20210331\Symfony\Component\Console\Input\InputArgument::IS_ARRAY, 'Files or directories to be upgraded.');
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_DRY_RUN, 'n', \Typo3RectorPrefix20210331\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'See diff of changes, do not save them to files.');
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_AUTOLOAD_FILE, 'a', \Typo3RectorPrefix20210331\Symfony\Component\Console\Input\InputOption::VALUE_REQUIRED, 'File with extra autoload');
        $names = $this->outputFormatterCollector->getNames();
        $description = \sprintf('Select output format: "%s".', \implode('", "', $names));
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_OUTPUT_FORMAT, 'o', \Typo3RectorPrefix20210331\Symfony\Component\Console\Input\InputOption::VALUE_OPTIONAL, $description, \Rector\ChangesReporting\Output\ConsoleOutputFormatter::NAME);
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_NO_PROGRESS_BAR, null, \Typo3RectorPrefix20210331\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'Hide progress bar. Useful e.g. for nicer CI output.');
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_NO_DIFFS, null, \Typo3RectorPrefix20210331\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'Hide diffs of changed files. Useful e.g. for nicer CI output.');
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_OUTPUT_FILE, null, \Typo3RectorPrefix20210331\Symfony\Component\Console\Input\InputOption::VALUE_REQUIRED, 'Location for file to dump result in. Useful for Docker or automated processes');
        $this->addOption(\Rector\Core\Configuration\Option::CACHE_DEBUG, null, \Typo3RectorPrefix20210331\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'Debug changed file cache');
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_CLEAR_CACHE, null, \Typo3RectorPrefix20210331\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'Clear unchaged files cache');
    }
    protected function execute(\Typo3RectorPrefix20210331\Symfony\Component\Console\Input\InputInterface $input, \Typo3RectorPrefix20210331\Symfony\Component\Console\Output\OutputInterface $output) : int
    {
        $this->configuration->resolveFromInput($input);
        $this->configuration->validateConfigParameters();
        $paths = $this->configuration->getPaths();
        $this->additionalAutoloader->autoloadWithInputAndSource($input, $paths);
        $fileExtensions = [];
        foreach ($this->processors as $processor) {
            $fileExtensions = \array_merge($processor->allowedFileExtensions(), $fileExtensions);
        }
        $files = $this->filesFinder->findInDirectoriesAndFiles($paths, $fileExtensions);
        if (\count($files) > 0) {
            $this->prepareProgressBar(\count($files));
            foreach ($files as $file) {
                foreach ($this->processors as $processor) {
                    $content = $processor->process($file);
                    if (!$this->configuration->isDryRun() && null !== $content) {
                        $this->smartFileSystem->dumpFile($file->getPathname(), $content);
                    }
                }
                $this->advanceProgressBar();
            }
            $this->finishProgressBar();
        }
        $outputFormatOption = $input->getOption(\Rector\Core\Configuration\Option::OPTION_OUTPUT_FORMAT);
        if (\is_array($outputFormatOption)) {
            $outputFormatOption = \Rector\ChangesReporting\Output\ConsoleOutputFormatter::NAME;
        }
        // report diffs and errors
        $outputFormat = (string) $outputFormatOption;
        $outputFormatter = $this->outputFormatterCollector->getByName($outputFormat);
        $outputFormatter->report($this->errorAndDiffCollector);
        // invalidate affected files
        $this->invalidateAffectedCacheFiles();
        // some errors were found → fail
        if ([] !== $this->errorAndDiffCollector->getErrors()) {
            return \Typo3RectorPrefix20210331\Symplify\PackageBuilder\Console\ShellCode::ERROR;
        }
        // inverse error code for CI dry-run
        if (!$this->configuration->isDryRun()) {
            return \Typo3RectorPrefix20210331\Symplify\PackageBuilder\Console\ShellCode::SUCCESS;
        }
        if (0 === $this->errorAndDiffCollector->getFileDiffsCount()) {
            return \Typo3RectorPrefix20210331\Symplify\PackageBuilder\Console\ShellCode::SUCCESS;
        }
        return \Typo3RectorPrefix20210331\Symplify\PackageBuilder\Console\ShellCode::ERROR;
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
    private function advanceProgressBar() : void
    {
        if (!$this->configuration->shouldShowProgressBar()) {
            return;
        }
        $this->symfonyStyle->progressAdvance();
    }
    private function prepareProgressBar(int $fileCount) : void
    {
        if (!$this->configuration->shouldShowProgressBar()) {
            return;
        }
        $this->symfonyStyle->progressStart($fileCount);
    }
    private function finishProgressBar() : void
    {
        if (!$this->configuration->shouldShowProgressBar()) {
            return;
        }
        $this->symfonyStyle->progressFinish();
    }
}
