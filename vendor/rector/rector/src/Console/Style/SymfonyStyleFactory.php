<?php

declare (strict_types=1);
namespace Rector\Core\Console\Style;

use Typo3RectorPrefix20210324\Symfony\Component\Console\Application;
use Typo3RectorPrefix20210324\Symfony\Component\Console\Input\ArgvInput;
use Typo3RectorPrefix20210324\Symfony\Component\Console\Output\ConsoleOutput;
use Typo3RectorPrefix20210324\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210324\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210324\Symplify\PackageBuilder\Reflection\PrivatesCaller;
final class SymfonyStyleFactory
{
    /**
     * @var PrivatesCaller
     */
    private $privatesCaller;
    public function __construct(\Typo3RectorPrefix20210324\Symplify\PackageBuilder\Reflection\PrivatesCaller $privatesCaller)
    {
        $this->privatesCaller = $privatesCaller;
    }
    public function create() : \Typo3RectorPrefix20210324\Symfony\Component\Console\Style\SymfonyStyle
    {
        $argvInput = new \Typo3RectorPrefix20210324\Symfony\Component\Console\Input\ArgvInput();
        $consoleOutput = new \Typo3RectorPrefix20210324\Symfony\Component\Console\Output\ConsoleOutput();
        // to configure all -v, -vv, -vvv options without memory-lock to Application run() arguments
        $this->privatesCaller->callPrivateMethod(new \Typo3RectorPrefix20210324\Symfony\Component\Console\Application(), 'configureIO', [$argvInput, $consoleOutput]);
        $debugArgvInputParameterOption = $argvInput->getParameterOption('--debug');
        // --debug is called
        if ($debugArgvInputParameterOption === null) {
            $consoleOutput->setVerbosity(\Typo3RectorPrefix20210324\Symfony\Component\Console\Output\OutputInterface::VERBOSITY_DEBUG);
        }
        return new \Typo3RectorPrefix20210324\Symfony\Component\Console\Style\SymfonyStyle($argvInput, $consoleOutput);
    }
}
