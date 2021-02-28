<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210228;

use Ssch\TYPO3Rector\Console\Application;
use Rector\Core\Console\Style\SymfonyStyleFactory;
use Ssch\TYPO3Rector\Bootstrap\Typo3RectorConfigsResolver;
use Ssch\TYPO3Rector\DependencyInjection\Typo3RectorContainerFactory;
use Ssch\TYPO3Rector\HttpKernel\Typo3RectorKernel;
use Typo3RectorPrefix20210228\Symplify\PackageBuilder\Console\ShellCode;
use Typo3RectorPrefix20210228\Symplify\PackageBuilder\Reflection\PrivatesCaller;
use Typo3RectorPrefix20210228\Symplify\SetConfigResolver\Bootstrap\InvalidSetReporter;
use Typo3RectorPrefix20210228\Symplify\SetConfigResolver\Exception\SetNotFoundException;
// @ intentionally: continue anyway
@\ini_set('memory_limit', '-1');
// Performance boost
\error_reporting(\E_ALL);
\ini_set('display_errors', 'stderr');
\gc_disable();
\define('__RECTOR_RUNNING__', \true);
// Require Composer autoload.php
$autoloadIncluder = new \Typo3RectorPrefix20210228\AutoloadIncluder();
$autoloadIncluder->includeDependencyOrRepositoryVendorAutoloadIfExists();
$autoloadIncluder->loadIfExistsAndNotLoadedYet(__DIR__ . '/../vendor/scoper-autoload.php');
$autoloadIncluder->loadIfExistsAndNotLoadedYet(\getcwd() . '/vendor/autoload.php');
$autoloadIncluder->autoloadProjectAutoloaderFile();
$autoloadIncluder->autoloadFromCommandLine();
$symfonyStyleFactory = new \Rector\Core\Console\Style\SymfonyStyleFactory(new \Typo3RectorPrefix20210228\Symplify\PackageBuilder\Reflection\PrivatesCaller());
$symfonyStyle = $symfonyStyleFactory->create();
$rectorConfigsResolver = new \Ssch\TYPO3Rector\Bootstrap\Typo3RectorConfigsResolver();
try {
    $bootstrapConfigs = $rectorConfigsResolver->provide();
    $rectorContainerFactory = new \Ssch\TYPO3Rector\DependencyInjection\Typo3RectorContainerFactory();
    $container = $rectorContainerFactory->createFromBootstrapConfigs($bootstrapConfigs);
} catch (\Typo3RectorPrefix20210228\Symplify\SetConfigResolver\Exception\SetNotFoundException $setNotFoundException) {
    $invalidSetReporter = new \Typo3RectorPrefix20210228\Symplify\SetConfigResolver\Bootstrap\InvalidSetReporter();
    $invalidSetReporter->report($setNotFoundException);
    exit(\Typo3RectorPrefix20210228\Symplify\PackageBuilder\Console\ShellCode::ERROR);
} catch (\Throwable $throwable) {
    $symfonyStyle->error($throwable->getMessage());
    exit(\Typo3RectorPrefix20210228\Symplify\PackageBuilder\Console\ShellCode::ERROR);
}
/** @var Application $application */
$application = $container->get(\Ssch\TYPO3Rector\Console\Application::class);
exit($application->run());
final class AutoloadIncluder
{
    /**
     * @var string[]
     */
    private $alreadyLoadedAutoloadFiles = [];
    public function includeDependencyOrRepositoryVendorAutoloadIfExists() : void
    {
        if (\class_exists(\Ssch\TYPO3Rector\HttpKernel\Typo3RectorKernel::class)) {
            return;
        }
        // in Rector develop repository
        $this->loadIfExistsAndNotLoadedYet(__DIR__ . '/../vendor/autoload.php');
    }
    /**
     * In case Rector is installed as vendor dependency,
     * this autoloads the project vendor/autoload.php, including Rector
     */
    public function autoloadProjectAutoloaderFile() : void
    {
        $this->loadIfExistsAndNotLoadedYet(__DIR__ . '/../../autoload.php');
    }
    public function autoloadFromCommandLine() : void
    {
        $cliArgs = $_SERVER['argv'];
        $autoloadOptionPosition = \array_search('-a', $cliArgs, \true) ?: \array_search('--autoload-file', $cliArgs, \true);
        if (!$autoloadOptionPosition) {
            return;
        }
        $autoloadFileValuePosition = $autoloadOptionPosition + 1;
        $fileToAutoload = $cliArgs[$autoloadFileValuePosition] ?? null;
        if ($fileToAutoload === null) {
            return;
        }
        $this->loadIfExistsAndNotLoadedYet($fileToAutoload);
    }
    public function loadIfExistsAndNotLoadedYet(string $filePath) : void
    {
        if (!\file_exists($filePath)) {
            return;
        }
        if (\in_array($filePath, $this->alreadyLoadedAutoloadFiles, \true)) {
            return;
        }
        $this->alreadyLoadedAutoloadFiles[] = \realpath($filePath);
        require_once $filePath;
    }
}
\class_alias('Typo3RectorPrefix20210228\\AutoloadIncluder', 'AutoloadIncluder', \false);
