<?php

declare (strict_types=1);
namespace Rector\Core\Console\Command;

use Typo3RectorPrefix20210412\Symfony\Component\Console\Command\Command;
use Typo3RectorPrefix20210412\Symfony\Component\Console\Input\InputInterface;
use Typo3RectorPrefix20210412\Symfony\Component\Console\Output\OutputInterface;
use Typo3RectorPrefix20210412\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210412\Symplify\PackageBuilder\Console\ShellCode;
use Typo3RectorPrefix20210412\Symplify\SmartFileSystem\FileSystemGuard;
use Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileSystem;
final class InitCommand extends \Typo3RectorPrefix20210412\Symfony\Component\Console\Command\Command
{
    /**
     * @var FileSystemGuard
     */
    private $fileSystemGuard;
    /**
     * @var SmartFileSystem
     */
    private $smartFileSystem;
    /**
     * @var SymfonyStyle
     */
    private $symfonyStyle;
    public function __construct(\Typo3RectorPrefix20210412\Symplify\SmartFileSystem\FileSystemGuard $fileSystemGuard, \Typo3RectorPrefix20210412\Symplify\SmartFileSystem\SmartFileSystem $smartFileSystem, \Typo3RectorPrefix20210412\Symfony\Component\Console\Style\SymfonyStyle $symfonyStyle)
    {
        $this->fileSystemGuard = $fileSystemGuard;
        $this->smartFileSystem = $smartFileSystem;
        $this->symfonyStyle = $symfonyStyle;
        parent::__construct();
    }
    protected function configure() : void
    {
        $this->setDescription('Generate rector.php configuration file');
    }
    protected function execute(\Typo3RectorPrefix20210412\Symfony\Component\Console\Input\InputInterface $input, \Typo3RectorPrefix20210412\Symfony\Component\Console\Output\OutputInterface $output) : int
    {
        $rectorTemplateFilePath = __DIR__ . '/../../../templates/rector.php.dist';
        $this->fileSystemGuard->ensureFileExists($rectorTemplateFilePath, __METHOD__);
        $rectorRootFilePath = \getcwd() . '/rector.php';
        $doesFileExist = $this->smartFileSystem->exists($rectorRootFilePath);
        if ($doesFileExist) {
            $this->symfonyStyle->warning('Config file "rector.php" already exists');
        } else {
            $this->smartFileSystem->copy($rectorTemplateFilePath, $rectorRootFilePath);
            $this->symfonyStyle->success('"rector.php" config file was added');
        }
        return \Typo3RectorPrefix20210412\Symplify\PackageBuilder\Console\ShellCode::SUCCESS;
    }
}
