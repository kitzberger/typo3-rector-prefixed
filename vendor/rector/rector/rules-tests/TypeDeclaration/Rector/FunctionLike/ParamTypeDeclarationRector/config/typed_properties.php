<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersionFeature;
use Rector\TypeDeclaration\Rector\FunctionLike\ParamTypeDeclarationRector;
use Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210423\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::PHP_VERSION_FEATURES, \Rector\Core\ValueObject\PhpVersionFeature::TYPED_PROPERTIES);
    $services = $containerConfigurator->services();
    $services->set(\Rector\TypeDeclaration\Rector\FunctionLike\ParamTypeDeclarationRector::class);
};
