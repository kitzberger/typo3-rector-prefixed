<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

use Rector\Php70\Rector\Ternary\TernaryToNullCoalescingRector;
use Typo3RectorPrefix20210422\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210422\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Php70\Rector\Ternary\TernaryToNullCoalescingRector::class);
};
