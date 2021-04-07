<?php

declare (strict_types=1);
namespace Rector\Core\Console;

use Typo3RectorPrefix20210407\Composer\XdebugHandler\XdebugHandler;
use OutOfBoundsException;
use Rector\ChangesReporting\Output\ConsoleOutputFormatter;
use Rector\Core\Bootstrap\NoRectorsLoadedReporter;
use Rector\Core\Configuration\Configuration;
use Rector\Core\Configuration\Option;
use Rector\Core\Exception\Configuration\InvalidConfigurationException;
use Rector\Core\Exception\NoRectorsLoadedException;
use Typo3RectorPrefix20210407\Symfony\Component\Console\Application;
use Typo3RectorPrefix20210407\Symfony\Component\Console\Command\Command;
use Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputDefinition;
use Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputInterface;
use Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputOption;
use Typo3RectorPrefix20210407\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210407\Symplify\PackageBuilder\Console\Command\CommandNaming;
use Throwable;
final class ConsoleApplication extends \Typo3RectorPrefix20210407\Symfony\Component\Console\Application
{
    /**
     * @var string
     */
    private const NAME = 'Rector';
    /**
     * @var NoRectorsLoadedReporter
     */
    private $noRectorsLoadedReporter;
    /**
     * @param Command[] $commands
     */
    public function __construct(\Rector\Core\Configuration\Configuration $configuration, \Rector\Core\Bootstrap\NoRectorsLoadedReporter $noRectorsLoadedReporter, \Typo3RectorPrefix20210407\Symplify\PackageBuilder\Console\Command\CommandNaming $commandNaming, array $commands = [])
    {
        try {
            $version = $configuration->getPrettyVersion();
        } catch (\OutOfBoundsException $outOfBoundsException) {
            $version = 'Unknown';
        }
        parent::__construct(self::NAME, $version);
        foreach ($commands as $command) {
            $commandName = $commandNaming->resolveFromCommand($command);
            $command->setName($commandName);
        }
        $this->addCommands($commands);
        $this->noRectorsLoadedReporter = $noRectorsLoadedReporter;
    }
    public function doRun(\Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputInterface $input, \Typo3RectorPrefix20210407\Symfony\Component\Console\Output\OutputInterface $output) : int
    {
        // @fixes https://github.com/rectorphp/rector/issues/2205
        $isXdebugAllowed = $input->hasParameterOption('--xdebug');
        if (!$isXdebugAllowed) {
            $xdebugHandler = new \Typo3RectorPrefix20210407\Composer\XdebugHandler\XdebugHandler('rector', '--ansi');
            $xdebugHandler->check();
            unset($xdebugHandler);
        }
        $shouldFollowByNewline = \false;
        // switch working dir
        $newWorkDir = $this->getNewWorkingDir($input);
        if ($newWorkDir !== '') {
            $oldWorkingDir = \getcwd();
            \chdir($newWorkDir);
            $output->isDebug() && $output->writeln('Changed CWD form ' . $oldWorkingDir . ' to ' . \getcwd());
        }
        // skip in this case, since generate content must be clear from meta-info
        if ($this->shouldPrintMetaInformation($input)) {
            $output->writeln($this->getLongVersion());
            $shouldFollowByNewline = \true;
        }
        if ($shouldFollowByNewline) {
            $output->write(\PHP_EOL);
        }
        return parent::doRun($input, $output);
    }
    public function renderThrowable(\Throwable $throwable, \Typo3RectorPrefix20210407\Symfony\Component\Console\Output\OutputInterface $output) : void
    {
        if (\is_a($throwable, \Rector\Core\Exception\NoRectorsLoadedException::class)) {
            $this->noRectorsLoadedReporter->report();
            return;
        }
        parent::renderThrowable($throwable, $output);
    }
    protected function getDefaultInputDefinition() : \Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputDefinition
    {
        $defaultInputDefinition = parent::getDefaultInputDefinition();
        $this->removeUnusedOptions($defaultInputDefinition);
        $this->addCustomOptions($defaultInputDefinition);
        return $defaultInputDefinition;
    }
    private function getNewWorkingDir(\Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputInterface $input) : string
    {
        $workingDir = $input->getParameterOption('--working-dir');
        if ($workingDir !== \false && !\is_dir($workingDir)) {
            $errorMessage = \sprintf('Invalid working directory specified, "%s" does not exist.', $workingDir);
            throw new \Rector\Core\Exception\Configuration\InvalidConfigurationException($errorMessage);
        }
        return (string) $workingDir;
    }
    private function shouldPrintMetaInformation(\Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputInterface $input) : bool
    {
        $hasNoArguments = $input->getFirstArgument() === null;
        if ($hasNoArguments) {
            return \false;
        }
        $hasVersionOption = $input->hasParameterOption('--version');
        if ($hasVersionOption) {
            return \false;
        }
        $outputFormat = $input->getParameterOption(['-o', '--output-format']);
        return $outputFormat === \Rector\ChangesReporting\Output\ConsoleOutputFormatter::NAME;
    }
    private function removeUnusedOptions(\Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputDefinition $inputDefinition) : void
    {
        $options = $inputDefinition->getOptions();
        unset($options['quiet'], $options['no-interaction']);
        $inputDefinition->setOptions($options);
    }
    private function addCustomOptions(\Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputDefinition $inputDefinition) : void
    {
        $inputDefinition->addOption(new \Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputOption(\Rector\Core\Configuration\Option::OPTION_CONFIG, 'c', \Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputOption::VALUE_REQUIRED, 'Path to config file', $this->getDefaultConfigPath()));
        $inputDefinition->addOption(new \Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputOption(\Rector\Core\Configuration\Option::OPTION_DEBUG, null, \Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'Enable debug verbosity (-vvv)'));
        $inputDefinition->addOption(new \Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputOption(\Rector\Core\Configuration\Option::XDEBUG, null, \Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'Allow running xdebug'));
        $inputDefinition->addOption(new \Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputOption(\Rector\Core\Configuration\Option::OPTION_CLEAR_CACHE, null, \Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputOption::VALUE_NONE, 'Clear cache'));
        $inputDefinition->addOption(new \Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputOption('working-dir', null, \Typo3RectorPrefix20210407\Symfony\Component\Console\Input\InputOption::VALUE_REQUIRED, 'If specified, use the given directory as working directory.'));
    }
    private function getDefaultConfigPath() : string
    {
        return \getcwd() . '/rector.php';
    }
}
