<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210329;

use Rector\Php53\Rector\AssignRef\ClearReturnNewByReferenceRector;
use Rector\Php53\Rector\FuncCall\DirNameFileConstantToDirConstantRector;
use Rector\Php53\Rector\Ternary\TernaryToElvisRector;
use Rector\Php53\Rector\Variable\ReplaceHttpServerVarsByServerRector;
use Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
return static function (\Typo3RectorPrefix20210329\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Php53\Rector\Ternary\TernaryToElvisRector::class);
    $services->set(\Rector\Php53\Rector\FuncCall\DirNameFileConstantToDirConstantRector::class);
    $services->set(\Rector\Php53\Rector\AssignRef\ClearReturnNewByReferenceRector::class);
    $services->set(\Rector\Php53\Rector\Variable\ReplaceHttpServerVarsByServerRector::class);
};
