<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

use Rector\Composer\Rector\AddPackageToRequireComposerRector;
use Rector\Composer\ValueObject\PackageAndVersion;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Composer\Rector\AddPackageToRequireComposerRector::class)->call('configure', [[\Rector\Composer\Rector\AddPackageToRequireComposerRector::PACKAGES_AND_VERSIONS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Composer\ValueObject\PackageAndVersion('vendor1/package3', '^3.0')])]]);
};
