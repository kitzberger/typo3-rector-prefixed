<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210324;

use Rector\Composer\Rector\RemovePackageComposerRector;
use Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Composer\Rector\RemovePackageComposerRector::class)->call('configure', [[\Rector\Composer\Rector\RemovePackageComposerRector::PACKAGE_NAMES => ['vendor1/package3', 'vendor1/package1', 'vendor1/package2']]]);
};
