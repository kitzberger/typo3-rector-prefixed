<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210227;

use PhpParser\ConstExprEvaluator;
use Typo3RectorPrefix20210227\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210227\Symplify\PackageBuilder\Php\TypeChecker;
return static function (\Typo3RectorPrefix20210227\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->autowire()->autoconfigure()->public();
    $services->load('Typo3RectorPrefix20210227\Symplify\\Astral\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/HttpKernel', __DIR__ . '/../src/StaticFactory', __DIR__ . '/../src/ValueObject']);
    $services->set(\PhpParser\ConstExprEvaluator::class);
    $services->set(\Typo3RectorPrefix20210227\Symplify\PackageBuilder\Php\TypeChecker::class);
};
