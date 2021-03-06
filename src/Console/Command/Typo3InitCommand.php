<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Console\Command;

use Typo3RectorPrefix20210423\Symfony\Component\Console\Command\Command;
use Typo3RectorPrefix20210423\Symfony\Component\Console\Input\InputInterface;
use Typo3RectorPrefix20210423\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210423\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210423\Symplify\PackageBuilder\Console\ShellCode;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileSystem;
final class Typo3InitCommand extends \Typo3RectorPrefix20210423\Symfony\Component\Console\Command\Command
{
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    /**
     * @var SymfonyStyle
     */
    private $symfonyStyle;
    public function __construct(\Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileSystem $smartFileSystem, \Typo3RectorPrefix20210423\Symfony\Component\Console\Style\SymfonyStyle $symfonyStyle)
    {
        parent::__construct();
        $this->smartFileSystem = $smartFileSystem;
        $this->symfonyStyle = $symfonyStyle;
    }
    protected function configure() : void
    {
        $this->setDescription('Generate rector.php configuration file specific for TYPO3');
    }
    protected function execute(\Typo3RectorPrefix20210423\Symfony\Component\Console\Input\InputInterface $input, \Typo3RectorPrefix20210423\Symfony\Component\Console\Output\OutputInterface $output) : int
    {
        $rectorConfigFiles = $this->smartFileSystem->exists(\getcwd() . '/rector.php');
        if (!$rectorConfigFiles) {
            $this->smartFileSystem->copy(__DIR__ . '/../../../templates/rector.php.dist', \getcwd() . '/rector.php');
            $this->symfonyStyle->success('"rector.php" config file has been generated successfully!');
        } else {
            $this->symfonyStyle->error('Config file not generated. A "rector.php" configuration file already exists');
        }
        return \Typo3RectorPrefix20210423\Symplify\PackageBuilder\Console\ShellCode::SUCCESS;
    }
}
