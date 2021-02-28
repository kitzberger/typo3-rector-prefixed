<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210228;

use PhpParser\BuilderFactory;
use PhpParser\NodeFinder;
use Typo3RectorPrefix20210228\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210228\Symfony\Component\Yaml\Parser;
use Typo3RectorPrefix20210228\Symplify\PackageBuilder\Parameter\ParameterProvider;
use Typo3RectorPrefix20210228\Symplify\PackageBuilder\Reflection\ClassLikeExistenceChecker;
return static function (\Typo3RectorPrefix20210228\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    $services->load('Typo3RectorPrefix20210228\Symplify\\PhpConfigPrinter\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/HttpKernel', __DIR__ . '/../src/Dummy', __DIR__ . '/../src/Bundle']);
    $services->set(\PhpParser\NodeFinder::class);
    $services->set(\Typo3RectorPrefix20210228\Symfony\Component\Yaml\Parser::class);
    $services->set(\PhpParser\BuilderFactory::class);
    $services->set(\Typo3RectorPrefix20210228\Symplify\PackageBuilder\Parameter\ParameterProvider::class);
    $services->set(\Typo3RectorPrefix20210228\Symplify\PackageBuilder\Reflection\ClassLikeExistenceChecker::class);
};
