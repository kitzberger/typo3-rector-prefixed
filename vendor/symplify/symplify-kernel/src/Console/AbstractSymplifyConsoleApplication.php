<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210302\Symplify\SymplifyKernel\Console;

use Typo3RectorPrefix20210302\Symfony\Component\Console\Application;
use Typo3RectorPrefix20210302\Symfony\Component\Console\Command\Command;
use Typo3RectorPrefix20210302\Symplify\PackageBuilder\Console\Command\CommandNaming;
abstract class AbstractSymplifyConsoleApplication extends \Typo3RectorPrefix20210302\Symfony\Component\Console\Application
{
    /**
     * @var CommandNaming
     */
    private $commandNaming;
    /**
     * @param Command[] $commands
     */
    public function __construct(array $commands, string $name = 'UNKNOWN', string $version = 'UNKNOWN')
    {
        $this->commandNaming = new \Typo3RectorPrefix20210302\Symplify\PackageBuilder\Console\Command\CommandNaming();
        $this->addCommands($commands);
        parent::__construct($name, $version);
    }
    /**
     * Add names to all commands by class-name convention
     * @param Command[] $commands
     */
    public function addCommands(array $commands) : void
    {
        foreach ($commands as $command) {
            $commandName = $this->commandNaming->resolveFromCommand($command);
            $command->setName($commandName);
        }
        parent::addCommands($commands);
    }
}
