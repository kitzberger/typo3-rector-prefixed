<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210408;

use Typo3RectorPrefix20210408\Symplify\EasyTesting\HttpKernel\EasyTestingKernel;
use Typo3RectorPrefix20210408\Symplify\SymplifyKernel\ValueObject\KernelBootAndApplicationRun;
$possibleAutoloadPaths = [
    // dependency
    __DIR__ . '/../../../autoload.php',
    // after split package
    __DIR__ . '/../vendor/autoload.php',
    // monorepo
    __DIR__ . '/../../../vendor/autoload.php',
];
foreach ($possibleAutoloadPaths as $possibleAutoloadPath) {
    if (\file_exists($possibleAutoloadPath)) {
        require_once $possibleAutoloadPath;
        break;
    }
}
$kernelBootAndApplicationRun = new \Typo3RectorPrefix20210408\Symplify\SymplifyKernel\ValueObject\KernelBootAndApplicationRun(\Typo3RectorPrefix20210408\Symplify\EasyTesting\HttpKernel\EasyTestingKernel::class);
$kernelBootAndApplicationRun->run();
