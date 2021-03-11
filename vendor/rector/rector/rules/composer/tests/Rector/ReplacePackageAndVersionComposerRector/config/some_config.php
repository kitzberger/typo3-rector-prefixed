<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210311;

use Rector\Composer\Rector\ReplacePackageAndVersionComposerRector;
use Rector\Composer\ValueObject\ReplacePackageAndVersion;
use Typo3RectorPrefix20210311\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210311\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Composer\Rector\ReplacePackageAndVersionComposerRector::class)->call('configure', [[\Rector\Composer\Rector\ReplacePackageAndVersionComposerRector::REPLACE_PACKAGES_AND_VERSIONS => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Composer\ValueObject\ReplacePackageAndVersion('vendor1/package1', 'vendor1/package3', '^4.0')])]]);
};
