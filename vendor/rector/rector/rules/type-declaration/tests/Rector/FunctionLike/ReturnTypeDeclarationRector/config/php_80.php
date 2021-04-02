<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210402;

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersionFeature;
use Rector\TypeDeclaration\Rector\FunctionLike\ReturnTypeDeclarationRector;
use Typo3RectorPrefix20210402\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210402\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::PHP_VERSION_FEATURES, \Rector\Core\ValueObject\PhpVersionFeature::STATIC_RETURN_TYPE);
    $services = $containerConfigurator->services();
    $services->set(\Rector\TypeDeclaration\Rector\FunctionLike\ReturnTypeDeclarationRector::class);
};
