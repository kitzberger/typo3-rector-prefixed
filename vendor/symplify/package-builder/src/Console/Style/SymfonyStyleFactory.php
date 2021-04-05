<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210405\Symplify\PackageBuilder\Console\Style;

use Typo3RectorPrefix20210405\Symfony\Component\Console\Application;
use Typo3RectorPrefix20210405\Symfony\Component\Console\Input\ArgvInput;
use Typo3RectorPrefix20210405\Symfony\Component\Console\Output\ConsoleOutput;
use Typo3RectorPrefix20210405\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210405\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210405\Symplify\EasyTesting\PHPUnit\StaticPHPUnitEnvironment;
use Typo3RectorPrefix20210405\Symplify\PackageBuilder\Reflection\PrivatesCaller;
final class SymfonyStyleFactory
{
    /**
     * @var PrivatesCaller
     */
    private $privatesCaller;
    public function __construct()
    {
        $this->privatesCaller = new \Typo3RectorPrefix20210405\Symplify\PackageBuilder\Reflection\PrivatesCaller();
    }
    public function create() : \Typo3RectorPrefix20210405\Symfony\Component\Console\Style\SymfonyStyle
    {
        // to prevent missing argv indexes
        if (!isset($_SERVER['argv'])) {
            $_SERVER['argv'] = [];
        }
        $argvInput = new \Typo3RectorPrefix20210405\Symfony\Component\Console\Input\ArgvInput();
        $consoleOutput = new \Typo3RectorPrefix20210405\Symfony\Component\Console\Output\ConsoleOutput();
        // to configure all -v, -vv, -vvv options without memory-lock to Application run() arguments
        $this->privatesCaller->callPrivateMethod(new \Typo3RectorPrefix20210405\Symfony\Component\Console\Application(), 'configureIO', [$argvInput, $consoleOutput]);
        // --debug is called
        if ($argvInput->hasParameterOption('--debug')) {
            $consoleOutput->setVerbosity(\Typo3RectorPrefix20210405\Symfony\Component\Console\Output\OutputInterface::VERBOSITY_DEBUG);
        }
        // disable output for tests
        if (\Typo3RectorPrefix20210405\Symplify\EasyTesting\PHPUnit\StaticPHPUnitEnvironment::isPHPUnitRun()) {
            $consoleOutput->setVerbosity(\Typo3RectorPrefix20210405\Symfony\Component\Console\Output\OutputInterface::VERBOSITY_QUIET);
        }
        return new \Typo3RectorPrefix20210405\Symfony\Component\Console\Style\SymfonyStyle($argvInput, $consoleOutput);
    }
}
