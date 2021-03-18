<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210318;

use Rector\Symfony2\Rector\MethodCall\AddFlashRector;
use Rector\Symfony2\Rector\MethodCall\RedirectToRouteRector;
use Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210318\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Symfony2\Rector\MethodCall\RedirectToRouteRector::class);
    $services->set(\Rector\Symfony2\Rector\MethodCall\AddFlashRector::class);
};
