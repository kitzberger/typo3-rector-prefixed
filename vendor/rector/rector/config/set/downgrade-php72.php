<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210411;

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Rector\DowngradePhp72\Rector\ClassMethod\DowngradeParameterTypeWideningRector;
use Rector\DowngradePhp72\Rector\FuncCall\DowngradePregUnmatchedAsNullConstantRector;
use Rector\DowngradePhp72\Rector\FunctionLike\DowngradeObjectTypeDeclarationRector;
use Typo3RectorPrefix20210411\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210411\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(\Rector\Core\Configuration\Option::PHP_VERSION_FEATURES, \Rector\Core\ValueObject\PhpVersion::PHP_71);
    $services = $containerConfigurator->services();
    $services->set(\Rector\DowngradePhp72\Rector\FunctionLike\DowngradeObjectTypeDeclarationRector::class);
    $services->set(\Rector\DowngradePhp72\Rector\ClassMethod\DowngradeParameterTypeWideningRector::class);
    $services->set(\Rector\DowngradePhp72\Rector\FuncCall\DowngradePregUnmatchedAsNullConstantRector::class);
};
