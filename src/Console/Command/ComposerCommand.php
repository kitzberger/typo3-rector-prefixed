<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Console\Command;

use Typo3RectorPrefix20210323\Nette\Utils\JsonException;
use Rector\Caching\Detector\ChangedFilesDetector;
use Rector\ChangesReporting\Application\ErrorAndDiffCollector;
use Rector\ChangesReporting\Output\ConsoleOutputFormatter;
use Rector\Core\Autoloading\AdditionalAutoloader;
use Rector\Core\Configuration\Configuration;
use Rector\Core\Configuration\Option;
use Rector\Core\Console\Command\AbstractCommand;
use Rector\Core\Console\Output\OutputFormatterCollector;
use Rector\Core\FileSystem\FilesFinder;
use Ssch\TYPO3Rector\Composer\ComposerProcessor;
use Typo3RectorPrefix20210323\Symfony\Component\Console\Input\InputArgument;
use Typo3RectorPrefix20210323\Symfony\Component\Console\Input\InputInterface;
use Typo3RectorPrefix20210323\Symfony\Component\Console\Input\InputOption;
use Typo3RectorPrefix20210323\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210323\Symplify\PackageBuilder\Console\ShellCode;
final class ComposerCommand extends \Rector\Core\Console\Command\AbstractCommand
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
     * @var ComposerProcessor
     */
    private $composerProcessor;
    public function __construct(\Rector\Core\Autoloading\AdditionalAutoloader $additionalAutoloader, \Rector\Caching\Detector\ChangedFilesDetector $changedFilesDetector, \Rector\Core\Configuration\Configuration $configuration, \Rector\ChangesReporting\Application\ErrorAndDiffCollector $errorAndDiffCollector, \Rector\Core\FileSystem\FilesFinder $phpFilesFinder, \Rector\Core\Console\Output\OutputFormatterCollector $outputFormatterCollector, \Ssch\TYPO3Rector\Composer\ComposerProcessor $composerProcessor)
    {
        $this->filesFinder = $phpFilesFinder;
        $this->additionalAutoloader = $additionalAutoloader;
        $this->errorAndDiffCollector = $errorAndDiffCollector;
        $this->configuration = $configuration;
        $this->outputFormatterCollector = $outputFormatterCollector;
        $this->changedFilesDetector = $changedFilesDetector;
        $this->composerProcessor = $composerProcessor;
        parent::__construct();
    }
    protected function configure() : void
    {
        $this->setAliases(['composer']);
        $this->setDescription('Upgrade custom composer.json');
        $this->addArgument(\Rector\Core\Configuration\Option::SOURCE, \Typo3RectorPrefix20210323\Symfony\Component\Console\Input\InputArgument::OPTIONAL | \Typo3RectorPrefix20210323\Symfony\Component\Console\Input\InputArgument::IS_ARRAY, 'Files or directories to be upgraded.');
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_DRY_RUN, 'n', \Typo3RectorPrefix20210323\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'See diff of changes, do not save them to files.');
        $names = $this->outputFormatterCollector->getNames();
        $description = \sprintf('Select output format: "%s".', \implode('", "', $names));
        $this->addOption(\Rector\Core\Configuration\Option::OPTION_OUTPUT_FORMAT, 'o', \Typo3RectorPrefix20210323\Symfony\Component\Console\Input\InputOption::VALUE_OPTIONAL, $description, \Rector\ChangesReporting\Output\ConsoleOutputFormatter::NAME);
    }
    protected function execute(\Typo3RectorPrefix20210323\Symfony\Component\Console\Input\InputInterface $input, \Typo3RectorPrefix20210323\Symfony\Component\Console\Output\OutputInterface $output) : int
    {
        $this->configuration->setIsDryRun((bool) $input->getOption(\Rector\Core\Configuration\Option::OPTION_DRY_RUN));
        $paths = $this->configuration->getPaths();
        $commandLinePaths = (array) $input->getArgument(\Rector\Core\Configuration\Option::SOURCE);
        // manual command line value has priority
        if ([] !== $commandLinePaths) {
            $paths = $commandLinePaths;
        }
        $this->additionalAutoloader->autoloadWithInputAndSource($input, $paths);
        $composerJsonFiles = $this->filesFinder->findInDirectoriesAndFiles($paths, ['json']);
        foreach ($composerJsonFiles as $composerJsonFile) {
            try {
                $this->composerProcessor->process($composerJsonFile->getRealPath());
            } catch (\Typo3RectorPrefix20210323\Nette\Utils\JsonException $jsonException) {
            }
        }
        $outputFormatOption = $input->getOption(\Rector\Core\Configuration\Option::OPTION_OUTPUT_FORMAT);
        if (\is_array($outputFormatOption)) {
            $outputFormatOption = \Rector\ChangesReporting\Output\ConsoleOutputFormatter::NAME;
        }
        // report diffs and errors
        $outputFormat = (string) $outputFormatOption;
        $outputFormatter = $this->outputFormatterCollector->getByName($outputFormat);
        $outputFormatter->report($this->errorAndDiffCollector);
        // inverse error code for CI dry-run
        if ($this->configuration->isDryRun() && $this->errorAndDiffCollector->getFileDiffsCount()) {
            return \Typo3RectorPrefix20210323\Symplify\PackageBuilder\Console\ShellCode::ERROR;
        }
        return \Typo3RectorPrefix20210323\Symplify\PackageBuilder\Console\ShellCode::SUCCESS;
    }
}
