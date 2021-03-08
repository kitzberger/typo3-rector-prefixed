<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210308;

use Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210308\Symplify\PackageBuilder\Neon\NeonPrinter;
use Typo3RectorPrefix20210308\Symplify\PackageBuilder\Reflection\ClassLikeExistenceChecker;
return static function (\Typo3RectorPrefix20210308\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    $services->load('Typo3RectorPrefix20210308\Symplify\\RuleDocGenerator\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/HttpKernel', __DIR__ . '/../src/ValueObject']);
    $services->set(\Typo3RectorPrefix20210308\Symplify\PackageBuilder\Neon\NeonPrinter::class);
    $services->set(\Typo3RectorPrefix20210308\Symplify\PackageBuilder\Reflection\ClassLikeExistenceChecker::class);
};
