<?php

declare (strict_types=1);
namespace Rector\Testing\PhpConfigPrinter;

use Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\HttpKernel\PhpConfigPrinterKernel;
use Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\Printer\SmartPhpConfigPrinter;
final class PhpConfigPrinterFactory
{
    public function create() : \Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\Printer\SmartPhpConfigPrinter
    {
        $phpConfigPrinterKernel = new \Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\HttpKernel\PhpConfigPrinterKernel('prod', \true);
        $phpConfigPrinterKernel->setConfigs([__DIR__ . '/config/php-config-printer-config.php']);
        $phpConfigPrinterKernel->boot();
        $container = $phpConfigPrinterKernel->getContainer();
        return $container->get(\Typo3RectorPrefix20210329\Symplify\PhpConfigPrinter\Printer\SmartPhpConfigPrinter::class);
    }
}
