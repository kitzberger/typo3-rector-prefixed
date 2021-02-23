<?php

declare (strict_types=1);
namespace Rector\Core\Autoloading;

use Typo3RectorPrefix20210223\Nette\Loaders\RobotLoader;
use Rector\Core\Configuration\Option;
use Typo3RectorPrefix20210223\Symfony\Component\Console\Input\InputInterface;
use Typo3RectorPrefix20210223\Symplify\PackageBuilder\Parameter\ParameterProvider;
use Typo3RectorPrefix20210223\Symplify\Skipper\SkipCriteriaResolver\SkippedPathsResolver;
use Typo3RectorPrefix20210223\Symplify\SmartFileSystem\FileSystemFilter;
use Typo3RectorPrefix20210223\Symplify\SmartFileSystem\FileSystemGuard;
/**
 * Should it pass autoload files/directories to PHPStan analyzer?
 */
final class AdditionalAutoloader
{
    /**
     * @var string[]
     */
    private $autoloadPaths = [];
    /**
     * @var FileSystemFilter
     */
    private $fileSystemFilter;
    /**
     * @var SkippedPathsResolver
     */
    private $skippedPathsResolver;
    /**
     * @var FileSystemGuard
     */
    private $fileSystemGuard;
    public function __construct(\Typo3RectorPrefix20210223\Symplify\SmartFileSystem\FileSystemFilter $fileSystemFilter, \Typo3RectorPrefix20210223\Symplify\PackageBuilder\Parameter\ParameterProvider $parameterProvider, \Typo3RectorPrefix20210223\Symplify\Skipper\SkipCriteriaResolver\SkippedPathsResolver $skippedPathsResolver, \Typo3RectorPrefix20210223\Symplify\SmartFileSystem\FileSystemGuard $fileSystemGuard)
    {
        $this->autoloadPaths = (array) $parameterProvider->provideParameter(\Rector\Core\Configuration\Option::AUTOLOAD_PATHS);
        $this->fileSystemFilter = $fileSystemFilter;
        $this->skippedPathsResolver = $skippedPathsResolver;
        $this->fileSystemGuard = $fileSystemGuard;
    }
    /**
     * @param string[] $source
     */
    public function autoloadWithInputAndSource(\Typo3RectorPrefix20210223\Symfony\Component\Console\Input\InputInterface $input, array $source) : void
    {
        $autoloadDirectories = $this->fileSystemFilter->filterDirectories($this->autoloadPaths);
        $autoloadFiles = $this->fileSystemFilter->filterFiles($this->autoloadPaths);
        $this->autoloadFileFromInput($input);
        $this->autoloadDirectories($autoloadDirectories);
        $this->autoloadFiles($autoloadFiles);
        // the scanned file needs to be autoloaded
        $directories = $this->fileSystemFilter->filterDirectories($source);
        foreach ($directories as $directory) {
            // load project autoload
            if (\file_exists($directory . '/vendor/autoload.php')) {
                require_once $directory . '/vendor/autoload.php';
            }
        }
    }
    private function autoloadFileFromInput(\Typo3RectorPrefix20210223\Symfony\Component\Console\Input\InputInterface $input) : void
    {
        if (!$input->hasOption(\Rector\Core\Configuration\Option::OPTION_AUTOLOAD_FILE)) {
            return;
        }
        /** @var string|null $autoloadFile */
        $autoloadFile = $input->getOption(\Rector\Core\Configuration\Option::OPTION_AUTOLOAD_FILE);
        if ($autoloadFile === null) {
            return;
        }
        $this->autoloadFiles([$autoloadFile]);
    }
    /**
     * @param string[] $directories
     */
    private function autoloadDirectories(array $directories) : void
    {
        if ($directories === []) {
            return;
        }
        $robotLoader = new \Typo3RectorPrefix20210223\Nette\Loaders\RobotLoader();
        $robotLoader->ignoreDirs[] = '*Fixtures';
        $excludePaths = $this->skippedPathsResolver->resolve();
        foreach ($excludePaths as $excludePath) {
            $robotLoader->ignoreDirs[] = $excludePath;
        }
        // last argument is workaround: https://github.com/nette/robot-loader/issues/12
        $robotLoader->setTempDirectory(\sys_get_temp_dir() . '/_rector_robot_loader');
        $robotLoader->addDirectory(...$directories);
        $robotLoader->register();
    }
    /**
     * @param string[] $files
     */
    private function autoloadFiles(array $files) : void
    {
        foreach ($files as $file) {
            $this->fileSystemGuard->ensureFileExists($file, 'Extra autoload');
            require_once $file;
        }
    }
}