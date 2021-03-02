<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210302\Symplify\PackageBuilder\Console\Command;

use Typo3RectorPrefix20210302\Symfony\Component\Console\Command\Command;
use Typo3RectorPrefix20210302\Symfony\Component\Console\Input\InputOption;
use Typo3RectorPrefix20210302\Symfony\Component\Console\Style\SymfonyStyle;
use Typo3RectorPrefix20210302\Symplify\PackageBuilder\ValueObject\Option;
use Typo3RectorPrefix20210302\Symplify\SmartFileSystem\FileSystemGuard;
use Typo3RectorPrefix20210302\Symplify\SmartFileSystem\Finder\SmartFinder;
use Typo3RectorPrefix20210302\Symplify\SmartFileSystem\SmartFileSystem;
abstract class AbstractSymplifyCommand extends \Typo3RectorPrefix20210302\Symfony\Component\Console\Command\Command
{
    /**
     * @var SymfonyStyle
     */
    protected $symfonyStyle;
    /**
     * @var SmartFileSystem
     */
    protected $smartFileSystem;
    /**
     * @var SmartFinder
     */
    protected $smartFinder;
    /**
     * @var FileSystemGuard
     */
    protected $fileSystemGuard;
    public function __construct()
    {
        parent::__construct();
        $this->addOption(\Typo3RectorPrefix20210302\Symplify\PackageBuilder\ValueObject\Option::CONFIG, 'c', \Typo3RectorPrefix20210302\Symfony\Component\Console\Input\InputOption::VALUE_REQUIRED, 'Path to config file');
    }
    /**
     * @required
     */
    public function autowireAbstractSymplifyCommand(\Typo3RectorPrefix20210302\Symfony\Component\Console\Style\SymfonyStyle $symfonyStyle, \Typo3RectorPrefix20210302\Symplify\SmartFileSystem\SmartFileSystem $smartFileSystem, \Typo3RectorPrefix20210302\Symplify\SmartFileSystem\Finder\SmartFinder $smartFinder, \Typo3RectorPrefix20210302\Symplify\SmartFileSystem\FileSystemGuard $fileSystemGuard) : void
    {
        $this->symfonyStyle = $symfonyStyle;
        $this->smartFileSystem = $smartFileSystem;
        $this->smartFinder = $smartFinder;
        $this->fileSystemGuard = $fileSystemGuard;
    }
}
