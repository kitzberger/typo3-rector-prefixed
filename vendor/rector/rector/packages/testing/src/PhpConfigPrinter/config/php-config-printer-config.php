<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210308;

use Rector\Testing\PhpConfigPrinter\SymfonyVersionFeatureGuard;
use Rector\Testing\PhpConfigPrinter\YamlFileContentProvider;
use Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210308\Symplify\PhpConfigPrinter\Contract\SymfonyVersionFeatureGuardInterface;
use Typo3RectorPrefix20210308\Symplify\PhpConfigPrinter\Contract\YamlFileContentProviderInterface;
return static function (\Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->autowire()->public()->autoconfigure();
    $services->set(\Rector\Testing\PhpConfigPrinter\SymfonyVersionFeatureGuard::class);
    $services->alias(\Typo3RectorPrefix20210308\Symplify\PhpConfigPrinter\Contract\SymfonyVersionFeatureGuardInterface::class, \Rector\Testing\PhpConfigPrinter\SymfonyVersionFeatureGuard::class);
    $services->set(\Rector\Testing\PhpConfigPrinter\YamlFileContentProvider::class);
    $services->alias(\Typo3RectorPrefix20210308\Symplify\PhpConfigPrinter\Contract\YamlFileContentProviderInterface::class, \Rector\Testing\PhpConfigPrinter\YamlFileContentProvider::class);
};
