<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210321;

use Typo3RectorPrefix20210321\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Typo3RectorPrefix20210321\Symplify\PackageBuilder\Reflection\ClassLikeExistenceChecker;
use Typo3RectorPrefix20210321\Symplify\Skipper\ValueObject\Option;
use Typo3RectorPrefix20210321\Symplify\SmartFileSystem\Normalizer\PathNormalizer;
return static function (\Typo3RectorPrefix20210321\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Typo3RectorPrefix20210321\Symplify\Skipper\ValueObject\Option::SKIP, []);
    $parameters->set(\Typo3RectorPrefix20210321\Symplify\Skipper\ValueObject\Option::ONLY, []);
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    $services->load('Typo3RectorPrefix20210321\Symplify\\Skipper\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/Bundle', __DIR__ . '/../src/HttpKernel', __DIR__ . '/../src/ValueObject']);
    $services->set(\Typo3RectorPrefix20210321\Symplify\PackageBuilder\Reflection\ClassLikeExistenceChecker::class);
    $services->set(\Typo3RectorPrefix20210321\Symplify\SmartFileSystem\Normalizer\PathNormalizer::class);
};
