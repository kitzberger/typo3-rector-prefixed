<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210324;

use Rector\DowngradePhp70\Rector\FunctionLike\DowngradeTypeParamDeclarationRector;
use Rector\DowngradePhp70\Rector\FunctionLike\DowngradeTypeReturnDeclarationRector;
use Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210324\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\DowngradePhp70\Rector\FunctionLike\DowngradeTypeParamDeclarationRector::class);
    $services->set(\Rector\DowngradePhp70\Rector\FunctionLike\DowngradeTypeReturnDeclarationRector::class);
};
